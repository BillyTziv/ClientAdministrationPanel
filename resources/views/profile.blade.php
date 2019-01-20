@extends('layouts.app')

@section('content')
<div class="container-fluid"  >
    <div class="row"  >
        <div class="col-md-12">
            <div class="section-area">
                <!-- Section heading with the bottom line divider -->
                <div class="section-heading" >
                    <div class="section_subheading">
                
                        <h1><i class="fa fa-user" aria-hidden="true"></i>Client</h1>
                        <div class="section-heading-divider"></div>
                    </div>
                </div>

                <?php
                    // Create a SELECT SQL query to the database and get all the clients                       
                    $res = DB::select("select * from companies where `client_id`='$clientId'");
                    //echo "select * from companies where `client_id`='$clientId'";

                    // Total number of companies associated with the specific client.
                    $totalCompaniesFound = count($res); 
                    //echo $totalCompaniesFound;
                ?>

                <!-- Check the session status -->
                <div class="section-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    
                    <div class="profile-pi-table-outer">
                        <table>
                            <tr>
                                <td rowspan="5">
                                    <img style="text-align: center; margin: auto 35px auto 35px; " width="135px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/768px-Circle-icons-profile.svg.png" alt="">
                                </td>
                                <td colspan="3" class="profile-pi-name">{{$clientFirstname}} {{$clientSurname}}</td>
                            </tr>
                            <tr style="font-size: 16px; ">
                                
                                <th>Mobile</th>
                                <td>:</td>
                                <td>&nbsp; {{$clientMobile}}</td>
                                <th>Total Companies</th>
                                <td>:</td>
                                <td>&nbsp; <?php 
                                    if( isset($totalCompaniesFound)) {
                                        echo  $totalCompaniesFound;
                                    }
                                    ?> </td>
                            </tr>
                            <!-- <tr style="font-size: 16px; color: white;">
                            
                                <td>Τηλέφωνο (σταθ):</td>
                                <td>clientPhone</td>
                                <td></td>
                            </tr>-->
                            <tr style="font-size: 16px; ">
                                
                                <th>Email</th>
                                <td>:</td>
                                <td>&nbsp; {{$clientEmail}}</td>
                                <th>Total Services</th>
                                <td>:</td>
                                <td>&nbsp; <?php 
                                    if( isset($totalCompaniesFound)) {
                                        echo  $totalCompaniesFound;
                                    }
                                    ?> </td>
                            </tr>
                            <tr style="font-size: 16px;">
                                <th>Status</td>
                                <td>:</td>
                                <td>&nbsp; {{$is_active}}</td>
                                <td></td>
                            </tr>
                            <tr style="font-size: 16px;">
                                <th>ID</th>
                                <td>:</td>
                                <td><strong>&nbsp; {{$clientId}}</strong></td>
                                
                            </tr>
                            <tr>
                                <td style="text-align: center;">
                                    <form method="POST" action="{{URL::to('/update')}}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="rowId" value="<?php echo $clientId; ?>">
                                        <button type="submit" class="editProfileButton"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Profile </button>
                                    </form>
                                </td>
                            </tr>
                            
                        </table>
                    </div>
                   
                    <div class="profile-main-section">
                        <h3 class="profile-subheading"><i class="fa fa-briefcase"></i> <span>Companies</span><hr> </h3>
                        <!-- <h4 style="padding-left: 25px; color: white;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> <i>Μπορείς να επιλέξεις μια επιχείρηση για να δεις τις υπηρεσίες που σχετίζονται με αυτή. </i></h4>
                                -->
                        <table id="firsttable" class="profile-table" >
                            <thead>
                                <tr class='clickable-row'>
                                <th></th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Address</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Web</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < $totalCompaniesFound; $i++) 
                                <tr class="companyRow">
                                    <td >
                                        <form method="POST" action="{{URL::to('/updateCompany')}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="companyID" value="<?php echo  $res[$i]->id; ?>">
                                            <button type="submit" class="profileButton"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                    <td > <?php echo $res[$i]->id; ?></td>
                                    <td> <?php echo $res[$i]->name; ?> </td>
                                    <td> <?php echo $res[$i]->type; ?> </td>
                                    <td> <?php echo $res[$i]->location; ?> </td>
                                    <td> <?php echo $res[$i]->phone; ?> </td>
                                    <td> <?php echo $res[$i]->email; ?> </td>
                                    <td > <a target="_blank" href="https://www.<?php echo $res[$i]->website; ?>"><i class="fa fa-globe fa-2x" aria-hidden="true"></i> </a> </td>
                                    <td> <?php echo $res[$i]->comments; ?> </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>                      
            
                        <?php
                            // Create a SELECT SQL query to the database and get all the clients  
                            //echo $res[0]->id;
                            //echo $clientId;                     
                            $services = DB::select("select * from services where `client_id`='$clientId'");

                            // Total number of companies associated with the specific client.
                            $totalservices = count($services); 
                            //echo $totalservices;
                        ?>

                        <h3 class="profile-subheading"><i class="fa fa-gear"></i> <span>Services</span><hr> </h3>
                        <div  id="table-filter-text"></div>
                        <table id="test" class="profile-table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>ID</th>
                                    <th>Company ID</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Renew Date</th>
                                    <th>Total Cost</th>
                                    <th>Balance</th>
                                    <th>DEposit</th>
                                    <th>Maintenance Cost</th>
                                    <th>Comments</th>
                                </tr>
                            </thead>

                            <tbody>
                                @for ($i = 0; $i < $totalservices; $i++) 
                                <tr>
                                    <td >
                                        <form method="POST" action="{{URL::to('/updateService')}}">
                                            {{csrf_field()}}
                                            <input type="hidden" name="serviceID" value="<?php echo $services[$i]->id; ?>">
                                            <button type="submit" class="profileButton"><i class="fa fa-pencil" aria-hidden="true"></i></button>
                                        </form>
                                    </td>
                                    <td> <?php echo $services[$i]->id; ?></td>
                                    <td> <?php echo $services[$i]->company_id; ?> </td>
                                    <td> <?php echo $services[$i]->name; ?> </td>
                                    <td> <?php echo $services[$i]->type; ?> </td>
                                    <td> <?php echo $services[$i]->renew_date; ?> </td>
                                    <td> <?php echo $services[$i]->total_cost; ?> </td>
                                    <td> <?php echo $services[$i]->balance; ?> </td>
                                    <td> <?php echo $services[$i]->deposit; ?> </td>
                                    <td> <?php echo $services[$i]->maintenance_cost; ?> </td>
                                    <td> <?php echo $services[$i]->comments; ?> </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>
                            </br> </br>
                    </div>       
                    <script>
                        $(document).ready(function() {
                            // When page loads, display what exactly the services table contains.
                            document.getElementById("table-filter-text").innerHTML = "Προβολή όλων των υπηρεσιών";

                            // Count how many rows the services table contains.
                            var totalRows = document.getElementById("test").getElementsByTagName("tr").length;
                            
                            // Set an onclick() function to each row.
                            $('#firsttable').find('tr').click( function(){
                                // Find the selected company ID
                                var selectedCompany = $(this).find("td").eq(1).text();
                                var selectedCompanyName = $(this).find("td").eq(2).text();

                               
                                // Exclude the first row of companies table which is alwasy NaN
                                if( !isNaN(selectedCompany)) {
                                    // For each row in service table
                                    $('#test tr').each(function() {

                                        // Find the current company ID
                                        var currentCompany = parseInt($(this).find("td").eq(2).text(), 10);

                                        if( selectedCompany == currentCompany) {
                                            // All the services associated with the selected company.
                                            document.getElementById("table-filter-text").innerHTML = "Προβολή των υπηρεσιών της επιχείρησης" + selectedCompanyName + " με ID: " + selectedCompany;
                                            $(this).show();
                                        }else {
                                            // Services rows that are not associated with the specific selected company.
                                            $(this).hide();
                                        }
                                    
                                        // Always show the services header row
                                        $('#test').find('tr:first').show();
                                    });
                                }
                                
                            });
                        });
                    </script>
                </div> <!-- End of section-body -->
            </div> <!-- End of section-area -->
        </div> <!-- End of col-md-14 -->
    </div>  <!-- End of row -->
</div> <!-- End of container-fluid -->
@endsection