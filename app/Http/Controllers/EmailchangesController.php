<?php /** @noinspection PhpUndefinedFieldInspection */

namespace App\Http\Controllers;

use Hash;
use Mail;
use App\User;
use Validator;
use App\Emailchange;
use Illuminate\Http\Request;
use App\Mail\UserEmailUpdated;
use App\Mail\UserEmailUpdateVerification;

class EmailchangesController extends ModulebaseController
{

    /*********************************************************************
     * Grid related functions.
     * Uncomment the functions to show modified grid.
     ********************************************************************/

    /**
     * Define grid SELECT statement and HTML column name.
     * @return array
     */
    // public function gridColumns()
    // {
    //     return [
    //         //['table.id', 'id', 'ID'], // translates to => table.id as id and the last one ID is grid colum header
    //         ["{$this->module_name}.id", "id", "ID"],
    //         ["{$this->module_name}.name", "name", "Name"],
    //         ["updater.name", "user_name", "Updater"],
    //         ["{$this->module_name}.updated_at", "updated_at", "Updated at"],
    //         ["{$this->module_name}.is_active", "is_active", "Active"]
    //     ];
    // }

    /**
     * Construct SELECT statement based
     * @return array
     */
    // public function selectColumns()
    // {
    //     $select_cols = [];
    //     foreach ($this->gridColumns() as $col)
    //         $select_cols[] = $col[0] . ' as ' . $col[1];
    //
    //     return $select_cols;
    // }

    /**
     * Define Query for generating results for grid
     * @return \Illuminate\Database\Query\Builder|static
     */
    // public function sourceTables()
    // {
    //     return DB::table($this->module_name)
    //         ->leftJoin('users as updater', $this->module_name . '.updated_by', 'updater.id');
    // }

    /**
     * Define Query for generating results for grid
     * @return $this|mixed
     */
    // public function gridQuery()
    // {
    //     $query = $this->sourceTables()->select($this->selectColumns());
    //
    //     // Inject tenant context in grid query
    //     if ($tenant_id = inTenantContext($this->module_name)) {
    //         $query = injectTenantIdInModelQuery($this->module_name, $query);
    //     }
    //
    //     // Exclude deleted rows
    //     $query = $query->whereNull($this->module_name . '.deleted_at'); // Skip deleted rows
    //
    //     return $query;
    // }

    /**
     * Modify datatable values
     * @return mixed
     * @var $dt \Yajra\DataTables\DataTableAbstract
     */
    // public function datatableModify($dt)
    // {
    //     // First set columns for  HTML rendering
    //     $dt = $dt->rawColumns(['id', 'name', 'is_active']); // HTML can be printed for raw columns
    //
    //     // Next modify each column content
    //     $dt = $dt->editColumn('name', '<a href="{{ route(\'' . $this->module_name . '.edit\', $id) }}">{{$name}}</a>');
    //     $dt = $dt->editColumn('id', '<a href="{{ route(\'' . $this->module_name . '.edit\', $id) }}">{{$id}}</a>');
    //     $dt = $dt->editColumn('is_active', '@if($is_active)  Yes @else <span class="text-red">No</span> @endif');
    //
    //     return $dt;
    // }

    /**
     * Returns datatable json for the module index page
     * A route is automatically created for all modules to access this controller function
     * @return \Illuminate\Http\JsonResponse
     * @var \Yajra\DataTables\DataTables $dt
     */
    // public function grid()
    // {
    //     // Make datatable
    //     /** @var \Yajra\DataTables\DataTableAbstract $dt */
    //     $dt = datatables($this->gridQuery());
    //     $dt = $this->datatableModify($dt);
    //     return $dt->toJson();
    // }

    // ****************** Grid functions end *********************************

    /**
     * In Controller store(), update() before filling the model input values are
     * transformed. Usually it is a good approach for converting arrays to json.
     * @param  array $inputs
     * @return array
     */
    // public function transformInputs($inputs = [])
    // {
    //     /*
    //      * Convert an array input to csv
    //      ************************************************/
    //     // $arr_to_csv_inputs = [
    //     //     'partnercategory_ids'
    //     // ];
    //     //
    //     // foreach ($arr_to_csv_inputs as $i){
    //     //     if(isset($inputs[$i]) && is_array($inputs[$i])){
    //     //         $inputs[$i] = arrayToCsv($inputs[$i]);
    //     //     }else{
    //     //         $inputs[$i] = null;
    //     //     }
    //     // }
    //
    //     /*
    //      * Convert an array input to json
    //      ************************************************/
    //     $arr_to_json_inputs = [
    //         'field1_ids',
    //         'field2_ids',
    //     ];
    //
    //     foreach ($arr_to_json_inputs as $i) {
    //         if (isset($inputs[$i]) && is_array($inputs[$i])) {
    //             $inputs[$i] = json_encode($inputs[$i]);
    //         } else {
    //             $inputs[$i] = null;
    //         }
    //     }
    //
    //     return $inputs;
    // }
    // ****************** transformInputs functions end ***********************

    /**
     * Show the email update form for logged in user
     * @param  \Illuminate\Http\Request $request
     * @param  null $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showChangeEmailForm(Request $request, $token = null) {
        return view('custom.change-email')->with([
            'email' => $request->email
        ]);
    }

    /**
     * Send email verification
     * @param  \Illuminate\Http\Request $request
     * @return \App\Http\Controllers\EmailchangesController|\Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     */
    public function changeEmail(Request $request) {

        $rules = [
            'email' => 'required',
            'password' => 'required',
            'new_email' => 'required|email|different:email|unique:users,email|confirmed',
        ];
        $custom_validation_messages = [
            'new_email.unique' => 'The new email has already been taken. Please enter a different one.',
        ];

        $validator = Validator::make($request->all(), $rules, $custom_validation_messages);

        $ret = ret();
        if ($validator->fails()) {
            $ret = ret('fail', 'Validation error(s)', ['validation_errors' => json_decode($validator->messages(), true)]);
        } else {
            /** @var \App\User $user */
            if ($user = User::where('email', $request->email)->first()) {
                if (!Hash::check($request->password, $user->password)) {
                    $ret = ret('fail', 'Wrong password');
                } else {
                    $emailchange = Emailchange::create([
                        'old_email' => $request->email,
                        'new_email' => $request->new_email
                    ]);
                    Mail::to($request->new_email)->send(new UserEmailUpdateVerification($user, $emailchange));
                    $ret = ret('success', 'A verification email has been sent to the new email address');
                }
            } else {
                $ret = ret('fail', 'User not found');
            }
        }

        return $this->jsonOrRedirect($ret, $validator);
    }

    /**
     * Change email
     * @param  \Illuminate\Http\Request $request
     * @param $verification_code
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|string
     */
    public function changeEmailVerify(Request $request, $verification_code) {
        /** @var Emailchange $emailchange */
        $emailchange = Emailchange::where('verification_code', $verification_code)->whereNull('verified_at')
            ->remember(cacheTime('long'))->first();

        if ($emailchange) {
            /** @var \App\User $user */
            $user = User::where('email', $emailchange->old_email)->first();
            if ($user) {
                /**
                 * Save new email in database
                 */
                $user->email = $emailchange->new_email;
                $user->save();

                /**
                 * Log verification time.
                 */
                $emailchange->verified_at = now();
                $emailchange->save();

                /**
                 * Send email.
                 */
                Mail::to($user->email)->send(new UserEmailUpdated($user));

                /**
                 * Show success message
                 */
                return view('custom.change-email-success');
            }
        }

        return 'Verification link expired';
    }
}
