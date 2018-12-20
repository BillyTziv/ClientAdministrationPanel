@extends('layouts.app')

@section('content')
<div class="container-fluid"  >
    <div class="row"  >
        <div class="col-md-12">
            <div class="section-area">
                <!-- Section heading with the bottom line divider -->
                <div class="section-heading">
                    <h1>Διαχείριση Πελατολογίου</h1>
                    <div class="section-heading-divider"></div>
                </div>

                <!-- Check the session status -->
                <div class="section-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <?php
                        // Create a SELECT SQL query to the database and get all the clients                       
                        $data = DB::select('select * from clients');

                        // Total clients number
                        $totalClients = count($data); 
                    ?>

                    <!-- Output the total number of clients found -->
                    <!-- <h4>Σύνολο πελατών: <?php //echo $totalClients ?> </h4> -->
                    <div class="tableBar">
                        <table>
                            <tr>
                                <td>
                                    <div class="searchbox">
                                        <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Αναζήτηση με το επώνυμο...">
                                        <i class="fa fa-search fa-lg" aria-hidden="true"></i>
                                    </div>
                                </td>
                                
                                <td class="totalClients">ΣΥΝΟΛΙΚΟ ΠΕΛΑΤΩΝ: <span style="font-size: 22px; color: white; font-weight: bold;"><?php echo $totalClients; ?></span></td>
                        
                            </tr>
                        </table>
                    </div>

                    <!-- Display all the clients info -->
                    <table id="myTable" class="client-table">
                        <thead>
                            
                            <tr>
                                <th></th>
                                <th></th>
                                <th> <strong>ID</strong></th>
                                <th><strong>ονομα</strong></th>
                                <th><strong>Επωνυμο</strong></th>
                                <th><strong>Email</strong></th>
                                <th><strong>κινητο</strong></th>
                                <th><strong>Συνολικος Τζιρος</strong></th>
                                <th><strong># επιχ</strong></th>
                                <th><strong>Κατασταση</strong></th>
                            </tr>
                        </thead> 
                        <tbody>
                            @for ($i = 0; $i < $totalClients; $i++) 
                            <tr> <!-- style="background:   #0c7aaf; border: solid 1px #94bace;" -->
                                <td >
                                    <form method="POST" action="{{URL::to('/profile')}}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="rowId" value="<?php echo $i+1; ?>">
                                        <button type="submit" class="profileButton"><i class="fa fa-user" aria-hidden="true"></i></button>
                                    </form>
                                </td>
                                <td>
                                    <form method="POST" action="{{URL::to('/update')}}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="rowId" value="<?php echo $i+1; ?>">
                                        <button type="submit" class="editButton"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    </form>
                                </td>

                                <td class="clientsTableID"> <strong><?php echo $data[$i]->clientId; ?></strong> </td>
                                <td> <?php echo $data[$i]->clientFirstname; ?> </td>
                                <td> <?php echo $data[$i]->clientSurname; ?> </td>
                                <td> <?php echo $data[$i]->clientEmail; ?> </td>
                                <td> <?php echo $data[$i]->clientMobile; ?> </td>
                                
                                
                                <td>
                                    <?php // Client total turnover
                                        $selectedClient = $data[$i]->clientId;
                                        $clientCompanies = DB::select("select * from companies where `client_id`='$selectedClient'");
                                        $clientTotalCompanies = count($clientCompanies);

                                        // Go through all of the client comapanies and count the total ammount of euro.
                                        $totalAmmount = 0;
                                        foreach ($clientCompanies as $com) {
                                            $companyData = DB::select("select SUM(total_cost) as total_cost from services where `company_id`='$com->id'");
                                            //print_r ($companyData);
                                            $totalAmmount = $totalAmmount + $companyData[0]->total_cost;
                                        }
                                        echo $totalAmmount . " &euro;";
                                    ?>
                                </td>
                                <td> <?php echo $clientTotalCompanies; ?> </td>
                                <td> <?php echo "ΕΝΕΡΓΟΣ"; ?> </td>
                                <!--<td > <a target="_blank" href="https://www.<?php //echo $data[$i]->websiteURL; ?>"><i class="fa fa-globe fa-2x" aria-hidden="true"></i> </a> </td>-->

                                <?php
                                    // Get current date
                                    //$cDate = date('Y-m-d');
                                    //$cTime = strtotime($cDate);
                                    //echo  "</br>";

                                    // Get renew date
                                    //$rDate = $data[$i]->renewDate;
                                    //$rTime = strtotime($rDate);
                                    //echo $rTime . "</br>";

                                    //$x = date('2018-12-19');
                                    //$y = strtotime($x);
                                    //echo $y . "</br>";

                                    //echo ($cTime - $y) / 86400;

                                    //$secs = $cTime - $rTime;
                                    //echo $secs . "</br>";

                                    //$days = $secs / 86400;
                                    //echo $days . "</br>";

                                    //if( ($days  < 30) && ($days > -30) ) {
                                    //    echo "<td style=\"background: red; color: white; animation: blinker 1s linear infinite;\" id=\"renewDate\">" . $rDate . "</td>";
                                    //}else {
                                    //    echo "<td id=\"renewDate\">" . $rDate . "</td>";
                                    //}
                                ?>
                                
                            </tr>
                           
                            @endfor
                        </tbody>
                    </table> <!-- End of client-table -->

                    <script>
                        function myFunction() {
                            var input, filter, table, tr, td, i, txtValue;
                            input = document.getElementById("myInput");
                            filter = input.value.toUpperCase();
                            table = document.getElementById("myTable");
                            tr = table.getElementsByTagName("tr");
                            
                            for (i = 0; i < tr.length; i++) {
                                td = tr[i].getElementsByTagName("td")[4];
                                if (td) {
                                    txtValue = td.textContent || td.innerText;
                                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                                        tr[i].style.display = "";
                                    } else {
                                        tr[i].style.display = "none";
                                    }
                                }       
                            }
                        }
                    </script>

                    <script>
                        $(document).ready(function() {
                            // When page loads, display what exactly the services table contains.
                            document.getElementById("table-filter-text").innerHTML = "Προβολή όλων των υπηρεσιών";

                            // Count how many rows the services table contains.
                            var totalRows = document.getElementById("test").getElementsByTagName("tr").length;
                            
                            // Set an onclick() function to each row.
                            $('#myTable').find('tr').click( function(){
                                // Find the selected company ID
                                var selectedCompany = parseInt($(this).find('td:first').text(), 10);
                                var selectedCompanyName = $(this).find("td").eq(1).text();
                               

                         
                                    // For each row in service table
                                   

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
                             
                                
                            });
                        });
                    </script>
                </div> <!-- End of section-body -->
            </div> <!-- End of section-area -->
        </div> <!-- End of col-md-14 -->
    </div>  <!-- End of row -->
</div> <!-- End of container-fluid -->
@endsection
