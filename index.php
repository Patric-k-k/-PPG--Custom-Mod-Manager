<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-800 h-screen w-screen overflow-hidden flex flex-col">
    <!--Items-->
    <div class="lg:w-5/8 w-[100%] h-screen bg-slate-700 mx-auto transition-all transition-descrite h-16 max-h-16 overflow-y-scroll">
        <p class="text-white text-2xl text-center">USE SHIFT+ESC TO CLOSE THIS MENU</p>
        <input id="WorkshopPath" class="w-[90%] bg-slate-800/25 mx-auto ml-[5%] text-center text-white" type="text" placeholder="C:\SteamLibrary\steamapps\workshop\content\1118200" value="C:\SteamLibrary\steamapps\workshop\content\1118200" onkeypress="loaddata()"></input>
        <input id="ExternalActives" class="w-[90%] bg-slate-800/25 mx-auto ml-[5%] text-center text-white" type="text" placeholder="C:\SteamLibrary\steamapps\common\People Playground\externalactives" value="C:\SteamLibrary\steamapps\common\People Playground\externalactives" onkeypress="loaddata()"></input>
    </div>
    <div id="ItemsContent" class="overflow-y-scroll overflow-x-hidden lg:w-5/8 w-[100%] h-screen bg-slate-900 mx-auto transition-all transition-descrite text-white flex flex-wrap">
        <div class="bg-slate-800 my-[30%] h-[10%] w-[90%] mx-auto text-center rounded-2xl shadow-2xl shadow-cyan-800 text-white text-3xl p-4">LOADING...</div>
    </div>
    <script>
    function activate(_mid,_mname) {
        _mname = _mname.replace("'","`")
        _mname = _mname.replace('"',"``")
        document.getElementById(_mid).outerHTML = '<button id="' + _mid + '" onclick="deactivate(\'' + _mid + '\',\'' + _mname + '\')" class="bg-yellow-800/25 w-24 h-24 m-4 text-center rounded-xl">' + _mname + '</button>'
        $.ajax({
            method: "GET",
            url:"./act.php",
            data: {
                mid: _mid,
                extact: document.getElementById("ExternalActives").value
            }
        }).done(function( msg ) {
            document.getElementById(_mid).outerHTML = '<button id="' + _mid + '" onclick="deactivate(\'' + _mid + '\',\'' + _mname + '\')" class="bg-green-800/25 w-24 h-24 m-4 text-center rounded-xl">' + _mname + '</button>'
        });
    }
    function deactivate(_mid,_mname) {
        _mname = _mname.replace("'","`")
        _mname = _mname.replace('"',"``")
        document.getElementById(_mid).outerHTML = '<button id="' + _mid + '" onclick="activate(\'' + _mid + '\',\'' + _mname + '\')" class="bg-yellow-800/25 w-24 h-24 m-4 text-center rounded-xl">' + _mname + '</button>'
        document.getElementById(_mid).onclick = 'activate("' + _mid + '")'
        $.ajax({
            method: "GET",
            url:"./dea.php",
            data: {
                mid: _mid,
                extact: document.getElementById("ExternalActives").value
            }
        }).done(function( msg ) {
            document.getElementById(_mid).className = 'bg-red-800/25 w-24 h-24 m-4 text-center rounded-xl'
            document.getElementById(_mid).outerHTML = '<button id="' + _mid + '" onclick="activate(\'' + _mid + '\',\'' + _mname + '\')" class="bg-red-800/25 w-24 h-24 m-4 text-center rounded-xl">' + _mname + '</button>'
        });
    }
    function loaddata() {
        document.getElementById("ItemsContent").innerHTML = "<div class='bg-slate-800 my-[30%] h-[10%] w-[90%] mx-auto text-center rounded-2xl shadow-2xl shadow-cyan-800 text-white text-3xl p-4'>LOADING...</div>"
        $.ajax({
            method: "GET",
            url:"./items.php",
            data: {
                path: document.getElementById("WorkshopPath").value,
                extact: document.getElementById("ExternalActives").value
            }
        }).done(function( msg ) {
            document.getElementById("ItemsContent").innerHTML = msg
        });
    }
    function loaddata_seemless() {
        $.ajax({
            method: "GET",
            url:"./items.php",
            data: {
                path: document.getElementById("WorkshopPath").value,
                extact: document.getElementById("ExternalActives").value
            }
        }).done(function( msg ) {
            document.getElementById("ItemsContent").innerHTML = msg
        });
    }
    loaddata()
    </script>
</body>