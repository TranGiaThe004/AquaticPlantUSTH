4.1. Vị trí & naming

    Tất cả API controller đặt trong: App\Http\Controllers\Api\...

    Tên controller:

    TankApiController, WaterLogApiController, QuestionApiController, …

    Admin: App\Http\Controllers\Api\Admin\UserManagementController, …

    Route API: nằm trong routes/api.php.

    Dùng Route::prefix('tanks'), Route::prefix('qa'), … để nhóm.

4.2. Kế thừa & response JSON

    Tất cả API controller phải:

    use App\Http\Controllers\Api\BaseApiController;

    class TankApiController extends BaseApiController
    {
        // ...
    }


    Response chuẩn:

    Success:

    {
    "success": true,
    "data": { ... },
    "message": "Optional message"
    }


    Error chung:

    {
    "success": false,
    "message": "Error message"
    }


    Validation error (để mặc định của Laravel hoặc chuẩn hóa sau).

    Trong controller:

    return $this->success($tank, 'Tank created successfully.');
    // hoặc
    return $this->error('Tank not found', 404);

4.3. Auth + Policies

    Mỗi API phải gắn middleware phù hợp:

    Đọc data cá nhân: auth:web, active_user.

    Admin: thêm admin.

    Mọi thao tác update / delete resource phải dùng authorize() + Policy:

    public function update(Request $request, Tank $tank)
    {
        // Chỉ owner tank hoặc admin mới được update
        $this->authorize('update', $tank);

        $tank->update($request->validated());

        return $this->success($tank, 'Tank updated');
    }

    public function destroy(Tank $tank)
    {
        $this->authorize('delete', $tank);

        $tank->delete();

        return $this->success(null, 'Tank deleted');
    }


    Quy tắc chung:

    Comment: chỉ user comment đó + admin được delete / update.

    Tank: chỉ owner + admin được sửa/xóa.

    Post: chỉ author + admin.

    Question / Answer: dùng Policy tương ứng (chỉ đúng người & admin).

4.4. HTTP method & URL

    GET: lấy dữ liệu

    POST: tạo mới

    PUT/PATCH: update

    DELETE: xoá

    Ví dụ module Tanks:

    GET /api/tanks – list tank của user hiện tại.

    POST /api/tanks – tạo tank mới.

    GET /api/tanks/{tank} – xem chi tiết.

    PUT/PATCH /api/tanks/{tank} – update tank.

    DELETE /api/tanks/{tank} – xoá tank.

    Tương tự cho:

    Comments: /api/posts/{post}/comments, /api/comments/{comment}…

    Water logs: /api/tanks/{tank}/water-logs.

4.5. Quy ước naming trong code

    Request class: StoreTankRequest, UpdateTankRequest, …

    Model: số ít (Tank, WaterLog, PlantLog, …).

    Policy: TankPolicy, PostPolicy, …

    Dùng route model binding khi có thể:

    public function show(Tank $tank) { ... } // Laravel tự load theo {tank}