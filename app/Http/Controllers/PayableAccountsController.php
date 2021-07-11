<?php

namespace App\Http\Controllers;

use App\Models\AccountspaymentModel;
use App\Models\PayableAccountsModel;
use App\Models\DeliveryModel;
use App\Models\InventoryModel;
use App\Models\ProviderModel;
use App\Models\SalesCreditModel;
use App\Models\SalesItemModel;
use App\Models\SalesModel;
use App\Models\SalesPaymentModel;
use App\Models\SalesStateModel;
use Illuminate\Http\Request;

class PayableAccountsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index()
    {
        $data = [];
        $data['from'] = '2015-01-01';
        $data['to'] = date('Y-m-d',time()+86400);
        $data['main_menu'] = "Cuentas por pagar";
        $data['sub_menu'] = "";
        $provider_info = ProviderModel::get();
        $data['provider_info'] = $provider_info;
        return view('backend.payable_accounts.index', $data);
    }
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'idproveedor' => 'required',
        ]);
        $account = new PayableAccountsModel();
        $account->fetcha_hora = date('Y-m-d H:i:s');
        $account->idproveedor = $request->idproveedor;
        $account->importe = $request->cantidad;
        $account->comentarios = $request->comentarios ? $request->comentarios : null;
        $account->save();
        $idcuenta = $account->idcuentas;
        $account_payment = new AccountspaymentModel();
        $account_payment->idcuenta = $idcuenta;
        $account_payment->fetcha_hora = date('Y-m-d H:i:s');
        $account_payment->cantidad = $request->abono;
        $account_payment->comentario = $request->comentarios ? $request->comentarios : null;
        if ($account_payment->save()) {
            return redirect('accounts_payable')->with('success', 'Cuentas agregada con éxito');
        } else {
            return redirect()->back()->with('error', 'An error occurred! Please try again.');
        }
    }
    public function store_payment(Request $request)
    {
        //dd($request->all());

        $payment_account = new AccountspaymentModel();
        $payment_account->fetcha_hora = date('Y-m-d H:i:s');
        $payment_account->idcuenta = $request->id_account;
        $payment_account->cantidad = $request->abono;
        $payment_account->comentario = "";
        if ($payment_account->save()) {
            return redirect('accounts_payable')->with('success', 'Cuentas agregada con éxito');
        } else {
            return redirect()->back()->with('error', 'An error occurred! Please try again.');
        }
    }
    public function delete(Request $request)
    {
        $id = $request->delete_accounts_id;

        $account_payment = AccountspaymentModel::where('idcuenta', $id)->first();
        $accounts = PayableAccountsModel::where('idcuentas', $id)->first();
        $sales_delivery = DeliveryModel::where('idventa', $id)->first();
        if ( $account_payment!= null) {
            $account_payment->delete();
        };
        if ( $accounts!= null) {
            if ($accounts->delete()) {
                return redirect()->back()->with('success', 'Cuenta eliminado con éxito.');
            } else {
            return redirect()->back()->with('error', 'Error en la eliminación de Cuenta!');
                }
        }
            else {
                return redirect()->back()->with('error', 'Error en la eliminación de Cuenta!');
            }
    }

    public function provider_data(string $id)
    {
        $data = [];
        $data['main_menu'] = "Cuentas por pagar";
        $data['sub_menu'] = "Datos del proveedor";
        $account_info = PayableAccountsModel::where('idcuentas', $id)->get();
        foreach ($account_info as $row) {
            $providor_id = $row->idproveedor;
            $amount = $row->importe;
            $comment = $row->comentarios;
        }
        $provider_info = ProviderModel::where('idproveedores', $providor_id)->get();
        $provider_payment = AccountspaymentModel::where('idcuenta', $id)
            ->get();
        $Total = 0;
        foreach ($provider_payment as $crow) {
            $total = $crow->cantidad;
            $Total += $total;
        }
        if ( $Total < $amount ){
            $state = "payable";
        } else{
            $state = "";
        }
        $data['id_account'] = $id ;
        $data['payable_amount'] = $amount ;
        $data['comment'] = $comment ;
        $data['provider_info'] = $provider_info ;
        $data['total_payment'] = $Total ;
        $data['payment_info'] = $provider_payment ;
        $data['unpaid'] = $state ;
        //dd($data);
        return view('backend.payable_accounts.add_payment', $data);
    }
    public function date_filter(Request $request)
    {
        $data = [];
        if ($request->filled('from_date')) {
            $from = $request->from_date;
            $to = $request->to_date;
        } else {
            $from = '2010-01-01';
            $to = date('Y-m-d');
        }
        $data['main_menu'] = "Cuentas por pagar";
        $data['sub_menu'] = "";
        $data['from'] = $from;
        $data['to'] = $to;
        $provider_info = ProviderModel::get();
        $data['provider_info'] = $provider_info;
        return view('backend.payable_accounts.index', $data);
    }
    public function fetch_accounts_payable_data(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        //dd($request->all());
        $get_accounts_payable = PayableAccountsModel::where('fetcha_hora', '>=',$from)
            ->where('fetcha_hora', '<=',$to)
            ->orderBy('idcuentas', 'DESC')
            ->get();
        //dd($get_accounts_payable);
        if ($get_accounts_payable->count() > 0) {
            $data = [];
            foreach ($get_accounts_payable as $row) {
                $id = $row->idcuentas;
                $fecha_hora = $row->fetcha_hora;
                $provider_id = $row->idproveedor;
                $importe = $row->importe;
                $provider_info = ProviderModel::where('idproveedores',$provider_id)->get();
                //dd($delivery_name);
                if ($provider_info->count() > 0 ) {
                    foreach ($provider_info as $crow) {
                        $provider_name = $crow->nombre;
                    }
                } else {
                    $provider_name = 'N/A';
                }
                $accounts_payment = AccountspaymentModel::where('idcuenta', $id)
                    ->sum('cantidad');

                if ( $accounts_payment >= $importe ) {
                    $status = "<label class='label label-success'>Liquidado</label>";
                } else {
                    $status = "<label class='label label-danger'>Pendiente</label>";
                }
                $account_url = route('payment', ['account'=>$id]);
                $account_btn = "<a href=\"$account_url\"><span data-toggle=\"tooltip\" data-placement=\"top\" title=\"Archive\" class=\"fa fa-eye\"></span></a>";
                $delete_btn = "<a href=\"javascript:void(0)\"><span data-toggle=\"tooltip\" onclick='show_delete_modal(\"$id\")' data-placement=\"top\" title=\"Delete\" class=\"glyphicon glyphicon-trash\"></span></a>";
                $action = "$account_btn $delete_btn";
                $temp = array();

                array_push($temp, $fecha_hora);
                array_push($temp, $provider_name);
                array_push($temp, $importe);
                array_push($temp, $accounts_payment);
                array_push($temp, $status);
                array_push($temp, $action);
                array_push($data, $temp);

            }
            echo json_encode(array('data'=>$data));
        } else {
            echo '{
                    "sEcho": 1,
                    "iTotalRecords": "0",
                    "iTotalDisplayRecords": "0",
                    "aaData": []
                }';
        }

    }


}
