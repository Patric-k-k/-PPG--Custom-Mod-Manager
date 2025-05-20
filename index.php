<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-slate-800 h-screen w-screen overflow-hidden flex flex-col">
    <!--Items-->
    <div class="lg:w-5/8 w-[100%] h-screen bg-slate-700 mx-auto transition-all transition-descrite h-16 max-h-16">
        <input id="WorkshopPath" class="w-[90%] bg-slate-800/25 mx-auto ml-[5%] text-center text-white" type="text" placeholder="C:\SteamLibrary\steamapps\workshop\content\1118200" value="C:\SteamLibrary\steamapps\workshop\content\1118200" onkeypress="loaddata()"></input>
        <input id="ExternalActives" class="w-[90%] bg-slate-800/25 mx-auto ml-[5%] text-center text-white" type="text" placeholder="C:\SteamLibrary\steamapps\common\People Playground\externalactives" value="C:\SteamLibrary\steamapps\common\People Playground\externalactives" onkeypress="loaddata()"></input>
    </div>
    <div id="ItemsContent" class="overflow-y-scroll lg:w-5/8 w-[100%] h-screen bg-slate-900 mx-auto transition-all transition-descrite text-white flex flex-wrap">
        <div class="bg-slate-800 my-[30%] h-[10%] w-[90%] mx-auto text-center rounded-2xl shadow-2xl shadow-cyan-800 text-white text-3xl p-4">LOADING...</div>
    </div>
    <script>
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
    loaddata()
    </script>
</body>