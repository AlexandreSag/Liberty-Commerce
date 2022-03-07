function loadNOrders() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("N_Orders").innerHTML =
      this.responseText;
    }
  };

  xhttp.open("GET", "js/import/N_Orders.txt", true);
  xhttp.send();
}

function loadBestorders() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("Best_Order").innerHTML =
      this.responseText;
    }
  };

  xhttp.open("GET", "js/import/Best_Orders.txt", true);
  xhttp.send();
}

function loadUser() {
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("User").innerHTML =
      this.responseText;
    }
  };

  xhttp.open("GET", "js/import/Online_Users.txt", true);
  xhttp.send();
}

/*
public function store(){
        $users = User::select("*")->get();
        Storage::disk('my_files')->put("js/import/Online_Users.txt", $users);
        return view("ajax");
}
*/



