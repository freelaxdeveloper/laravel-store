<?php
namespace App\Http\Middleware;
use Closure;
class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        # гостей перенаправляем на страницу авторизации
        if ($request->user() === null) {
            return redirect(route('login'));
        }
        $actions = $request->route()->getAction();

        $roles = isset($actions['roles']) ? $actions['roles'] : null;
        # если в списке доступных ролей есть роль в которой состоит пользователь
        # разрешаем доступ
        if ($request->user()->hasAnyRole($roles)) {
            return $next($request);
        }
        # если подходящей роли нету
        return redirect(route('home'));
        //return response('У вас нет доступа', 401);
    }
}