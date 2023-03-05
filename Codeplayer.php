
<html>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <head>
        
        <title>Examination Portal</title>
 
        <script type="text/javascript" src="jquery.min.js"></script>
        
        <style type="text/css">
        
            body {
                
                font-family: sans-serif;
                padding:0;
                margin:0;
                
            }
            
            #header {
                
                width:100%;
                background-color: aqua;
                padding:5px;
                height: 50px;
                
            }
            
            #logo {
                
                float:left;
                font-weight: bold;
                font-size: 120%;
                padding: 4px 5px;
                
            }
            #back{
                float: right;
               
            }
            
            #buttonContainer {
                
                width:233px;
                margin: 0 auto;
                
                
            }
            
            .toggleButton {
                
                float:left;
                border: 1px solid grey;
                padding: 6px;
                border-right: none;
                font-size: 90%;
                
            }
        
            #html {
                
                border-top-left-radius: 4px;
                border-bottom-left-radius: 4px;
                
            }
            
            #output {
                
                border-top-right-radius: 4px;
                border-bottom-right-radius: 4px;
                border-right: 1px solid grey;
                
            }
            
            .active {
                
                background-color: #980FF7;
                
            }
            
            .highlightedButton {
                
                background-color: #0F40F7;
                
            }
            
            textarea {
                
                resize: none;
                border-top: none;
                border-color: #0F40F7;
                
            }
            
            .panel {
                
                float:left;
                width: 50%;
                border-left: none;
            }
            
            iframe {
                
                border:none;
                
            }
            
            .hidden {
                
                display: none;
                
            }
        
        </style>
        
    </head>

    <body>
        
        <div id="header">
        
            <div id="logo">
            
                CodePlayer
                
            </div>
            
            <div id="buttonContainer">
                
                <div class="toggleButton active" id="html">HTML</div>
                
                <div class="toggleButton" id="css">CSS</div>
                
                <div class="toggleButton" id="javascript">JavaScript</div>
                
                <div class="toggleButton active" id="output">Output</div>
            
            </div>
            
        </div>
        
        <div id="bodyContainer">
        
            <textarea id="htmlPanel" class="panel"><p id="paragraph">Welcome to G.L BAJAJ</p></textarea>
            
            <textarea id="cssPanel" class="panel hidden">p { color: darkblue; }</textarea>
            
            <textarea id="javascriptPanel" class="panel hidden">document.getElementById("paragraph").innerHTML = "Welcome to the free online tool for Basic Web Designing";</textarea>
            
            <iframe id="outputPanel" class="panel"></iframe>
        
        
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script type="text/javascript">
            
            function updateOutput() {
                
                $("iframe").contents().find("html").html("<html><head><style type='text/css'>" + $("#cssPanel").val() + "</style></head><body>" + $("#htmlPanel").val() + "</body></html>");
                
                document.getElementById("outputPanel").contentWindow.eval($("#javascriptPanel").val());
                
                
                
            }
            
            $(".toggleButton").hover(function() {
                
                $(this).addClass("highlightedButton");
                
            }, function() {
                
                $(this).removeClass("highlightedButton");
                
            });
            
            $(".toggleButton").click(function() {
                
                $(this).toggleClass("active");
                
                $(this).removeClass("highlightedButton");
                
                var panelId = $(this).attr("id") + "Panel";
                
                $("#" + panelId).toggleClass("hidden");
                
                var numberOfActivePanels = 4 - $('.hidden').length;
                
                $(".panel").width(($(window).width() / numberOfActivePanels) - 10);
                
            })
            
            $(".panel").height($(window).height() - $("#header").height() - 15);
            
            $(".panel").width(($(window).width() / 2) - 10);
            
            updateOutput();
            
            $("textarea").on('change keyup paste', function() {
    
                updateOutput();
                
                
            });
            
    

        </script>
        
    </body>

</html>