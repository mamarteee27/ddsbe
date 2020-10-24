<?php

    namespace App\Http\Controllers;
    use Illuminate\Http\Request;
    use App\Traits\ApiResponser;
    use App\User;
    use DB;
    Class UserController extends Controller {
        use ApiResponser;
        private $request;

        public function __construct(Request $request){
        $this->request = $request;
        }

        public function loginPage(){
            return view('login');
        }

        public function validateUser(){
        
            $username = $_POST['username'];
            $password = $_POST['password'];

            $user = app('db')->select("SELECT * FROM tbluser WHERE username='$username' and password='$password'");

            if(empty($user)){
                return 'No account registered or Invalid login credentials.';
            }else{
                return redirect()->route('dashboard');
            }
            
        }
        public function dashboard(){
            $id = app('db')->select("SELECT id FROM tbluser");
            $username = app('db')->select("SELECT username FROM tbluser");
            $password = app('db')->select("SELECT password FROM tbluser");

            $data = [
                'id'=>$id,
                'username'=>$username,
                'password'=>$password
            ];
            return view('dashboard')->with($data);
        }
        public function createUser(Request $request){
            $rules = [
                'username' => 'required|max:20',
                'password' => 'required|max:20'
            ];

            $this->validate($request, $rules);
            $user = User::create($request->all());
                return redirect()->route('dashboard');

            // return $this->successResponse($user, Response::HTTP_CREATED);

            // $users = app('db')->select("SELECT * FROM tbluser");

            // if(count($users)>0){
            //     $idcount = DB::table('tbluser')->orderBy('id', 'DESC')->first();
            //     $idcount = $idcount->id;
            //     $user = new User;
            //     $user->id=($idcount+1);
            //     $user->password = $request->input('password');
            //     $user->username = $request->input('username');
                
            //     if ($user->create()) {
            //         return redirect()->route('dashboard');
            //     }
            // }else{
            //     $user = new User;
            //     $user->id = (count($users)+ 1);
            //     $user->password = $request->input('password');
            //     $user->username = $request->input('username');
            //     // $user = User::create($request->all());
            //     if ($user->create()) {
            //         return redirect()->route('dashboard');
            //     }
            // }
           
        }

        public function createPage(){
            return view('create');
        }

        public function editPage(){
            $id = app('db')->select("SELECT id FROM tbluser");
            $username = app('db')->select("SELECT username FROM tbluser");
            $password = app('db')->select("SELECT password FROM tbluser");

            $data = [
                'id' => $id,
                'username' => $username,
                'password' => $password
            ];
            return view('edit')->with($data);
        }

        public function update(){
            $id = $_POST['idSearch'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            app('db')->table('tbluser')->where('id', $id)->update(['username' => $username, 'password' => $password]);
            return redirect()->route('dashboard');
        }

        public function delete(){
            $id = $_POST['delete_id'];
            app('db')->table('tbluser')->where('id', $id) -> delete();
                return redirect()->route('dashboard');
            // $user = User::findOrFail($id);
            // $user->delete();
            //     return $this->errorResponse('User ID Does Not Exists', Response::HTTP_NOT_FOUND);
        }

    }
?>