@extends('layouts.app')

@section('content')
<div class="container-fluid"  >
    <div class="row"  >
        <div class="col-md-12">
            <div class="section-area">
                <!-- Section heading with the bottom line divider -->
                <div class="section-heading">
                    <h1>Προφιλ Πελάτη</h1>
                    <div class="section-heading-divider"></div>
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
                    
                    <table class="profile-personal-info">
                        <tr>
                            <td  rowspan="5">
                                <img style="margin-right: 50px;" width="150px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/768px-Circle-icons-profile.svg.png" alt="">
                            </td>
                            <td style="text-align: center; font-size: 28px; color: white;">{{$clientFirstname}} {{$clientSurname}}</td>
                        </tr>
                        <tr style="font-size: 16px; color: white;">
                            
                            <td >Προσωπικό Κινητό</td>
                            <td>:</td>
                            <td>&nbsp; {{$clientMobile}}</td>
                            <td></td>
                        </tr>
                        <!-- <tr style="font-size: 16px; color: white;">
                           
                            <td>Τηλέφωνο (σταθ):</td>
                            <td>clientPhone</td>
                            <td></td>
                        </tr>-->
                        <tr style="font-size: 16px; color: white;">
                            
                            <td>Email</td>
                            <td>:</td>
                            <td>&nbsp; {{$clientEmail}}</td>
                            <td></td>
                        </tr>
                        <tr style="font-size: 16px; color: white;">
                            <td>Πλήθος Καταστημάτων</td>
                            <td>:</td>
                            <td>&nbsp; <?php 
                                if( isset($totalCompaniesFound)) {
                                    echo  $totalCompaniesFound;
                                }
                                ?> </td>
                            <td></td>
                        </tr>
                        <tr style="font-size: 16px; color: white;">
                            <td>Μοναδικός Αριθμός ID</td>
                            <td>:</td>
                            <td><strong>&nbsp; {{$clientId}}</strong></td>
                        </tr>
                    </table>

                    <div class="profile-main-section">
                        <h3 class="profile-subheading"><i class="fa fa-briefcase"></i> <span>Επιχειρήσεις</span><hr> </h3>
                        <h4 style="padding-left: 25px; color: white;"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> <i>Μπορείς να επιλέξεις μια επιχείρηση για να δεις τις υπηρεσίες που σχετίζονται με αυτή. </i></h4>
                        
                        <table id="firsttable" class="profile-table" >
                            <thead>
                                <tr class='clickable-row'>
                                    <th>ID</th>
                                    <th>Επωνυμια</th>
                                    <th>Τυπος</th>
                                    <th>Διευθυνση</th>
                                    <th>Τηλ (σταθ)</th>
                                    <th>Email</th>
                                    <th>Ιστοσελιδα</th>
                                    <th>Σχολια</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < $totalCompaniesFound; $i++) 
                                <tr class="companyRow">
                                    <td > <?php echo $res[$i]->id; ?></td>
                                    <td> <?php echo $res[$i]->name; ?> </td>
                                    <td> <?php echo $res[$i]->type; ?> </td>
                                    <td> <?php echo $res[$i]->location; ?> </td>
                                    <td> <?php echo $res[$i]->phone; ?> </td>
                                    <td> <?php echo $res[$i]->email; ?> </td>
                                    <td> <?php echo $res[$i]->website; ?> </td>
                                    <td> <?php echo $res[$i]->comments; ?> </td>
                                </tr>
                                @endfor
                            </tbody>
                        </table>                      
            
                        <?php
                            // Create a SELECT SQL query to the database and get all the clients  
                            //echo $res[0]->id;                     
                            $services = DB::select("select * from services where `client_id`='$clientId'");

                            // Total number of companies associated with the specific client.
                            $totalservices = count($services); 
                        ?>

                        <h3 class="profile-subheading"><i class="fa fa-gear"></i> <span>Υπηρεσίες</span><hr> </h3>
                        <div style="color: yellow; font-size: 16px;" id="table-filter-text"></div>
                        <table id="test" class="profile-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>ID Επιχειρησης</th>
                                    <th>ονομα</th>
                                    <th>Τυπος</th>
                                    <th>Ημερ/νια Ανανεωσης</th>
                                    <th>Συνολικο Κοστος</th>
                                    <th>Υπολοιπο</th>
                                    <th>Προκαταβολη</th>
                                    <th>Κοστος Συντηρησης</th>
                                    <th>Σχολια</th>
                                </tr>
                            </thead>

                            <tbody>
                                @for ($i = 0; $i < $totalservices; $i++) 
                                <tr>
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
                                var selectedCompany = parseInt($(this).find('td:first').text(), 10);
                                var selectedCompanyName = $(this).find("td").eq(1).text();
                                

                                // Exclude the first row of companies table which is alwasy NaN
                                if( !isNaN(selectedCompany)) {
                                    // For each row in service table
                                    $('#test tr').each(function() {

                                        // Find the current company ID
                                        var currentCompany = parseInt($(this).find("td").eq(1).text(), 10);

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