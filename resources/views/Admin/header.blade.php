<meta charset="utf-8" />
<link rel="icon" type="image/png" href="assets/img/favicon.ico">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

<title>Light Bootstrap Dashboard by Creative Tim</title>

<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
<meta name="viewport" content="width=device-width" />


<!-- Bootstrap core CSS     -->
<link href="{{url('css/bootstrap.min.css')}}" rel="stylesheet" />

<!-- Animation library for notifications   -->
<link href="{{url('css/animate.min.css')}}" rel="stylesheet" />

<!--  Light Bootstrap Table core CSS    -->
<link href="{{url('css/light-bootstrap-dashboard.css?v=1.4.0')}}" rel="stylesheet" />

<!--  CSS for Demo Purpose, don't include it in your project     -->
<link href="{{url('css/demo.css')}}" rel="stylesheet" />




<!--     Fonts and icons     -->
<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
<link href="{{url('css/pe-icon-7-stroke.css')}}" rel="stylesheet" />
<script>
    function addActivityField() {
        // Get the container element for activity fields
        var activityContainer = document.getElementById("activityContainer");

        // Create a new div element for the activity field
        var activityField = document.createElement("div");
        activityField.className = "col-md";

        // Create an input element for the activity name
        var input = document.createElement("input");
        input.type = "text";
        input.className = "form-control";
        input.placeholder = "Kegiatan";
        input.id = "activity"
        input.name = "activity[]";  // Use an array name to capture multiple activities

        // Add the label and input to the activity field div
        activityField.appendChild(input);

        // Add the activity field div to the container
        activityContainer.appendChild(activityField);
    }
    function removeLastActivityField() {
        var activityContainer = document.getElementById("activityContainer");
        if (activityContainer.children.length > 1) {
            activityContainer.removeChild(activityContainer.lastChild);
        }
    }
</script>
<script src="http://code.jquery.com/jquery.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>