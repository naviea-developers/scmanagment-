<?php

namespace App\Http\Controllers\Backend\Home;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function manageMenu()
    {
        $data['menus'] = Menu::all();
        return view('Backend.home.menu.index', $data);
    }
    public function createMenu()
    {
        return view('Backend.home.menu.create');
    }
    public function storMenu(Request $request)
    {
        $menu = new Menu();
        $menu->name = $request->name;
        $menu->position = $request->position;
        $menu->url = $request->url;
        $menu->type = $request->menu_type;
        $menu->column_num = $request->column_num;
        $menu->save();
        return redirect()->route('admin.manage_menu')->with('message', 'Menu create successfully, Thank you.');
    }
    public function editMenu($id)
    {
        $data['menu'] = Menu::find($id);
        return view('Backend.home.menu.update',$data);
    }
    public function updateMenu(Request $request, $id)
    {
        $menu = Menu::find($id);
        $menu->name = $request->name;
        $menu->position = $request->position;
        $menu->url = $request->url;
        $menu->type = $request->menu_type;
        $menu->column_num = $request->column_num;
        $menu->update();
        return redirect()->route('admin.manage_menu')->with('message', 'Menu Update successfully, Thank you.');
    }
    public function deleteMenu(Request $request)
    {
        $menu= Menu::find($request->menu_id);
        $menu->delete();
        return redirect()->route('admin.manage_menu')->with('message', 'Menu deleted successfully, Thank you.');
    }

    public function menu_status_toggle($id)
    {
        $menu = Menu::find($id);
        if($menu->status == 0)
        {
            $menu->status = 1;
        }elseif($menu->status == 1)
        {
            $menu->status = 0;
        }
        $menu->update();
        return redirect()->route('admin.manage_menu')->with('message', 'Status update successfully. Thank you.');
    }
}
