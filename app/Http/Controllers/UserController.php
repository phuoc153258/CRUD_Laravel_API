<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Services\Paginate\PaginateService;
use App\Traits\HttpResponse;
use App\Repositories\UserRepository\UserRepositoryInterface;

class UserController extends Controller
{
    use HttpResponse;
    public PaginateService $paginateService;
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->paginateService = new PaginateService();
        $this->userRepository = $userRepository;
    }

    public function index(Request $request)
    {
        $query =  DB::table('users');
        $options = [
            'search' => empty($request->input('search')) ? '' : $request->input('search'),
            'sort' => empty($request->input('sort')) ? 'asc' : $request->input('sort'),
            'limit' => empty($request->input('limit')) ? 5 : intval($request->input('limit')),
            'page' => empty($request->input('page')) ? 1 : intval($request->input('page')),
            'search_by' => 'name',
            'sort_by' => 'id',
            'select' => ['*']
        ];
        $usersResponse = $this->paginateService->paginate($options, $query);
        return $this->success($usersResponse, trans('message.get-list-user-success'), 200);
    }

    public function show($id)
    {
        $user = $this->userRepository->getUserById($id);
        if (empty($user))
            return $this->error(null, trans('message.get-user-failed'), 400);

        return $this->success($user, trans('message.get-user-success'), 200);
    }

    public function create(CreateUserRequest $request)
    {
        $user = $this->userRepository->getUserByCondition('email', $request->input('email'));
        if (!empty($user)) return $this->error(null, trans('message.email-is-exist'), 400);
        $user = User::create($request->validated());
        return $this->success($user, trans('message.create-user-success'), 200);
    }

    public function update(Request $request, $id)
    {
        $user = $this->userRepository->getUserById($id);

        if (empty($user)) return $this->error(null, trans('message.user-is-not-exist'), 400);

        if (!empty($request->input('name')))
            $user->name = $request->input('name');

        if (!empty($request->input('email')))
            $user->email = $request->input('email');

        if (!empty($request->input('password')))
            $user->password = $request->input('password');

        if (!empty($request->input('avatar')))
            $user->avatar = $request->input('avatar');

        $user->save();
        return $this->success($user, trans('message.update-user-success'), 200);
    }

    public function delete($id)
    {
        $user = $this->userRepository->getUserById($id);
        if (empty($user)) return $this->error(null, trans('message.user-is-not-exist'), 400);

        $user->delete();
        return $this->success($user, trans('message.delete-user-success'), 200);
    }
}
