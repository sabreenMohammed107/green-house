<?php

namespace App\Http\Controllers\Api;

use App\Http\Resources\NotificationsResourse;
use App\Http\Resources\TransactionDataResource;
use App\Http\Resources\TransactionResource;
use App\Http\Resources\UserDataResource;
use App\Http\Resources\YearResource;
use App\Models\FCMNotification;
use App\Models\Transaction;
use App\Models\Transaction_detail;
use App\Models\User;
use App\Models\Year;
use App\Services\FCMService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends BaseController
{
    //
    public function allTransactions(Request $request)
    {
        if(Auth::guard('api')->check()){
            $user = Auth::user();
            $data = [];
            $years = Year::all();
            $data['years'] = YearResource::collection($years);
            // array_push($data, YearResource::collection($years));

            if (!empty($request->get("year_id"))) {

                $year = Year::where('year', 'LIKE', '%' . $request->get("year_id") . '%')->first();

                if ($year) {
                    $transactions = Transaction::where('user_id', '=', $user->id)->
                        whereHas('month', function ($query) use ($year) {
                        $query->where('year_id', '=', $year->id);
                    })->get();
                    $transactions->account_no = $user->bank_account;
                } else {
                    $transactions = [];

                }

            } else {
                $transactions = Transaction::where('user_id', '=', $user->id)->orderBy('id', 'DESC')->get();
                $transactions->account_no = $user->bank_account;
            }
            // $transactions = $transactions->get();

            // array_push($data, TransactionResource::collection($transactions));
            $data['transactions'] = TransactionResource::collection($transactions);
            if ($transactions && $transactions->count() > 0) {
                return $this->sendResponse($data, 'كل المعاملات المالية');
            } else {
                return $this->sendResponse($data, 'لا يوجد معاملات حتى الان');
            }
        }else{
            return $this->authCheck('حدث خطأ فى الدخول يرجى إعادة المحاولة');

        }



    }

    public function homeData(Request $request)
    {
        if(Auth::guard('api')->check()){
            $user = Auth::guard('api')->user();
            return $this->sendResponse(new UserDataResource($user), 'بيانات الصفحة الرئيسيه');
        }else{
            return $this->authCheck('حدث خطأ فى الدخول يرجى إعادة المحاولة');

        }




    }
    public function singleTransactions($id)
    {


        if (Auth::guard('api')->check()) {
            $row = Transaction::where('id', '=', $id)->first();
            $details = Transaction_detail::where('transaction_id', $id)->first();
            if ($details) {
                return $this->sendResponse(new TransactionDataResource($details), 'بيانات المعاملة');
            } else {
                return $this->sendError('حدث خطأ لا توجد معاملة ');
            }
        } else {
            return $this->authCheck('حدث خطأ فى الدخول يرجى إعادة المحاولة');

        }

    }

    public function listNofications(Request $request)
    {
        $user_id = auth()->user()->id;
        $notifications = FCMNotification::where('user_id', $user_id)->orderBy('id', 'desc')->limit(10)->get();

        // return NotificationsResourse::collection($notifications);
        return $this->sendResponse(NotificationsResourse::collection($notifications), ' الاشعارات');

    }

    public function updateNotifications(Request $request)
    {
        if(Auth::guard('api')->check()){
            $user_id = auth()->user()->id;

            FCMNotification::where('user_id', $user_id)->update(['status' => 'seen']);

            return $this->successResponse();
        }else{
            return $this->authCheck('حدث خطأ فى الدخول يرجى إعادة المحاولة');

        }



    }

    public function sendNotificationrToUser($id)
    {
        // get a user to get the fcm_token that already sent.               from mobile apps
        $user = User::findOrFail($id);

        $data = [
            'user_id' => 1,
            'title_en' => 'been',
            'title_en' => 'You have been accepted as instructor',
            'body_en' => 'ttttttttttt',
            'body_ar' => 'You',
        ];
        FCMNotification::Create($data);
        FCMService::send(
            $user->fcm_token,
            [
                'title' => 'your title',
                'body' => 'your body',
            ],
            [
                'message' => 'Extra Notification Data',
            ],
        );
        // get a user to get the fcm_token that already sent.               from mobile apps
        $user = User::findOrFail($id);

        FCMService::send(
            $user->fcm_token,
            [
                'title' => 'your title',
                'body' => 'your body',
            ],
            [
                'message' => 'Extra Notification Data',
            ],
        );

    }
    public function addFirebaseToken(Request $request)
    {
        $user_id = auth()->user()->id;
        $token = $request->token;
        User::where('id', $user_id)->update(['fcm_token', $token]);

        return $this->successResponse();

    }
}
