@extends('layouts.admin')
@section('content')
<div class="col-12 p-3">
	<div class="col-12 col-lg-12 p-0 main-box">
	 
		<div class="col-12 px-0">
			<div class="col-12 p-0 row">
				<div class="col-12 col-lg-4 py-3 px-3">
					<span class="fas fa-users"></span>	المستخدمين
				</div>
				<div class="col-12 col-lg-4 p-0">
				</div>
				<div class="col-12 col-lg-4 p-2 text-lg-end">
					@permission('users-create')
					<a href="{{route('admin.users.create')}}">
					<span class="btn btn-primary"><span class="fas fa-plus"></span> إضافة جديد</span>
					</a>
					@endpermission
				</div>
			</div>
			<div class="col-12 divider" style="min-height: 2px;"></div>
		</div>

		<div class="col-12 py-2 px-2 row">
			<div class="col-12 col-lg-4 p-2">
				<form method="GET">
					<input type="text" name="q" class="form-control" placeholder="بحث ... " value="{{request()->get('q')}}">
				</form>
			</div>
		</div>
		<div class="col-12 p-3" style="overflow:auto">
			<div class="col-12 p-0" style="min-width:1100px;">
				
			
			<table class="table table-bordered  table-hover">
				<thead>
					<tr>
						<th>#</th>
						<th>الاسم</th>
						<th>البريد</th>
						<th>تحكم</th>
					</tr>
				</thead>
				<tbody>
					@foreach($users as $user)
					<tr>
						<td>{{$user->id}}</td>
						<td>{{$user->name}}</td>
						<td>{{$user->email}}</td>
						<td>
							@permission('users-read')
							<a href="{{route('admin.users.show',$user)}}">
							<span class="btn  btn-outline-primary btn-sm font-1 mx-1">
								<span class="fas fa-search "></span> عرض
							</span>
							</a>
							@endpermission

							
							

							@permission('notifications-create')
							<a href="{{route('admin.notifications.index',['user_id'=>$user->id])}}">
							<span class="btn  btn-outline-primary btn-sm font-1 mx-1">
								<span class="far fa-bells"></span> الاشعارات
							</span>
							</a>
							<a href="{{route('admin.notifications.create',['user_id'=>$user->id])}}">
							<span class="btn  btn-outline-primary btn-sm font-1 mx-1">
								<span class="far fa-bell"></span>
							</span>
							</a> 
							@endpermission

							@permission('user-roles-update')
							<a href="{{route('admin.users.roles.index',$user)}}">
							<span class="btn btn-outline-primary btn-sm font-1 mx-1">
								<span class="fal fa-key "></span> الصلاحيات
							</span>
							</a>
							@endpermission
							
							@permission('users-update')
							<a href="{{route('admin.users.edit',$user)}}">
							<span class="btn  btn-outline-success btn-sm font-1 mx-1">
								<span class="fas fa-wrench "></span> تحكم
							</span>
							</a>
							@endpermission
							@permission('users-delete')
							<form method="POST" action="{{route('admin.users.destroy',$user)}}" class="d-inline-block">@csrf @method("DELETE")
								<button class="btn  btn-outline-danger btn-sm font-1 mx-1" onclick="var result = confirm('هل أنت متأكد من عملية الحذف ؟');if(result){}else{event.preventDefault()}">
									<span class="fas fa-trash "></span> حذف
								</button>
							</form>
							@endpermission
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</div>
		</div>
		<div class="col-12 p-3">
			{{$users->appends(request()->query())->render()}}
		</div>
	</div>
</div>
@endsection
