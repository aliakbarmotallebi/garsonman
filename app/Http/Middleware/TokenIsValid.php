<?php

namespace App\Http\Middleware;

use App\Models\Table;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Session\SessionManager;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class TokenIsValid
{
    protected $session;

    public function __construct(SessionManager $session)
    {
        $this->session = $session;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if( $request->has('table') ){

            $this->existsTableNumber($request);

            $this->session->put('LastActivityTime',  Carbon::now()->addMinutes(30));
            $this->session->put('TokenTable', $request->get('table'));
        }

        if( $this->session->has('LastActivityTime') ){
            if ( $this->hasExpired() ) {
                return abort(404);
            }
        }else{
            return abort(404);
        }

        return $next($request);
    }

    private function hasExpired(): bool
    {
        return (bool)(Carbon::now()->greaterThan( $this->session->get('LastActivityTime')));
    }

    private function existsTableNumber(Request $request)
    {
        $table = $request->get('table');

        $token = Table::whereToken($table);

        if(! $token->exists() ){
            return abort(404);
        }

    }

}
