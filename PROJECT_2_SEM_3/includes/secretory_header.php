<head>
    <meta charset="utf-8">
     <link rel="icon" href="img/123.jpg" type="image/png" sizes="30x30">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Semest 3 kudumbashree</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/navigation-menu.css">
</head>
<body>

<nav role="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" data-target="#navbarCollapse" data-toggle="collapse" class="navbar-toggle">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand">Kudumbashree</a>
        </div>
        <!-- Collection of nav links and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">Home</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Member <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="k_addmember.php">Add Member</a></li>
                        <li><a href="k_checkmember.php">Check Member</a></li>
                        <li><a href="k_show_detail.php">All Member</a></li>
                        <li><a href="k_delete-member.php">Delete Member</a></li>

                    </ul>
                </li>
                <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Deposit<span class="caret"></span></a>
                     <ul class="dropdown-menu">
                         <li><a href="k_deposit_amount.php">Deposit</a></li>
                         <li><a href="k_deposit_detail.php">Deposit Detail</a></li>
                     </ul>   
                </li>
                <li>
                     <a class="dropdown-toggle" data-toggle="dropdown" href="#">Loan<span class="caret"></span></a>
                     <ul class="dropdown-menu">
                         <li><a href="k_tack_loan.php">Tack loan</a></li>
                         <li><a href="k_loan_repay.php">Repay loan</a></li>
                         <li><a href="k_loan_repay_details.php">Repay detail</a></li>
                         <li><a href="k_member_loan.php">Loan Detail</a></li>
                     </ul>   
                </li>

                </li>                
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><!-- <a href="#">Login</a> -->
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Login <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="pan_index.php">Punchayath</a></li>
                            <li><a href="ks_index.php">Kudumbashree</a></li>
                            <li><a href="m_index.php">Member</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Gallery</a></li>
                        </ul>
                </li>
            </ul>

             <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><!-- <a href="#">Login</a> -->
                    <a class="toggle"  href="destroy session/">Logout <span class="caret"></span></a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><!-- <a href="#">Login</a> -->
                    <a class="toggle"  href="k_check.php">Check status</span></a>
                </li>
            </ul>

        </div>
    </div>
</nav>
