<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Wallet;
use App\Http\Requests\WalletRequest;

class WalletController extends Controller
{
    public function index(Company $company)
    {    
        $company_wallet_operations = $company->wallet;

        $balance = $company->balance;
        
        return view('backend.admin.companies.wallet.index', compact('company_wallet_operations', 'balance','company'));
    }

    public function create(Company $company)
    {
        $title = __('admin.add_wallet');
        return view('backend.admin.companies.wallet.create', compact('company','title'));
    }

    public function store(WalletRequest $request, Company $company)
    {

                
        if($company->balance < $request->debit){
            toastr()->error('من فضلك أدخل مبلغ صحيح');
            return redirect()->route('companies.wallet.index', $company->id);
        }

        $company->wallet()->create(['debit' => $request->debit]);
        
        $company->update([
            'balance' => $company->balance - $request->debit
        ]);
        
        toastr()->success('تم سحب المبلغ بنجاح');
        return redirect()->route('companies.wallet.index', $company->id);
    }
}
