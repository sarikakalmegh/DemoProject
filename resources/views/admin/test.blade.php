{{$role_name = Auth::user()->with('roleUsers','roleUsers.role')->find(Auth::id())}}
{{dd($role_name->roleUsers->id)}}



