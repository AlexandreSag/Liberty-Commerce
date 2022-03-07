<head>
    <script src="{{ URL::asset('js/ajax.js') }}"></script>
</head>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Admin
        </h2>
    </x-slot>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form class="form_add_elem" action="upload" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="title" class="form_title">Name</label><br><br>
                            <input type="text" name="title" class="form_input" placeholder="Name" required><br><br>
                        </div>

                        <div>
                            <label for="file" class="form_title">Path Of Picture</label><br><br>
                            <input type="file" name="file" class="form_input" placeholder="Path" required ><br><br>
                        </div>
                
                        <div>
                            <label for="description" class="form_title">Description</label><br><br>
                            <input type="text" name="description" class="form_input" placeholder="Description" required><br><br>
                        </div>
                
                        <div>
                            <label for="price" class="form_title">Price in €</label><br><br>
                            <input type="number" name="price" class="form_input" placeholder="Price" required><br><br>
                        </div>

                        <div>
                            <label for="year" class="form_title">Year</label><br><br>
                            <input type="number" name="year" class="form_input" placeholder="Year" required><br><br>
                        </div>

                        <div>
                            <label for="quantity" class="form_title">Quantity</label><br><br>
                            <input type="number" name="quantity" class="form_input" placeholder="Quantity" required><br><br>
                        </div>
                
                        <button class="submit" type="submit">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="ajaxBox">

        <div id="N_Orders">
            <h1><script>loadNOrders();</script></h1>
        </div>
        <div id="Best_Order">
            <h1><script>loadBestorders();</script></h1>
        </div>
        <div id="User">
            @php $users = DB::table('users')->get(); @endphp
                <table class="table">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Last Seen</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->firstname}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                @if(Cache::has('user-is-online-' . $user->id))
                                    <span class="text-success">Online</span>
                                @else
                                    <span class="text-secondary">Offline</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
        </div>
        @auth
        @if (Auth::user()->isOnline())
        
        <div>
            <button class="buttonAjax" type="button" onclick="loadNOrders();">Change Number</button>
        </div>
        <div>
            <button class="buttonAjax" type="button" onclick="loadBestorders();">Change Best</button>
        </div>

        <?php
                function php_func(){
                    $users = DB::table('users')->get();
                    $text1 = "<table class='table'>"."\n"."<thead>"."\n"."<tr>"."\n"."<th>Name</th>"."\n"."<th>Email</th>"."\n"."<th>Status</th>"."\n"."<th>Last Seen</th>"."\n";
                    $text2 = $text1."</tr>"."\n"."</thead>"."\n"."<tbody>"."\n";
                    $tempText = "";
                    foreach($users as $user){
                        if(Cache::has('user-is-online-' . $user->id)){
                            $span = "<span class='text-success'>Online</span>";
                        }
                        else{
                            $span = "<span class='text-secondary'>Offline</span>";
                        }
                        $tempText = $tempText."\n"."<tr>"."\n"."<td>".$user->firstname."</td>"."\n"."<td>".$user->email."</td>"."\n"."<td>"."\n".$span."\n"."</td>"."\n"."<td>".\Carbon\Carbon::parse($user->last_seen)->diffForHumans()."</td>"."\n"."</tr>";
                    }
                    $text3 = $text2.$tempText."\n"."</tbody>"."\n"."</table>";

                    Storage::disk('my_files')->put("js/import/Online_Users.txt", $text3);
                }
        ?>
        <script>
            function oui(){
                var result = "<?php php_func(); ?>"
            }
        </script>
        
        <div>
                <button class="buttonAjax" type="button" onclick="oui(); loadUser();">Change User</button>
        </div>
        @endif
        @endauth
    </div>
</x-app-layout>
