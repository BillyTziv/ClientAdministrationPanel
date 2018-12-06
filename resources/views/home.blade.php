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
                   
                    <!-- Display all the clients info -->
                    <table class="client-table">
                        <thead>
                            <tr >
                                <th colspan="2" rowspan="2"></th>
                                
                                <th style="font-weight: bold;" colspan="4">Στοιχεια Πελατη</th>
                                <th style="font-weight: bold;" class="companyTableBar" colspan="4">Στοιχεια Επιχειρησης</th>
                                <th colspan="2"></th>
                            </tr>
                            <tr>
                               
                               
                                <th>ID</th>
                                <th>ονομα</th>
                                <th>Επωνυμο</th>
                                <th>Email</th>
                                <th>Τηλ (κιν)</th>
                                <th>Τηλ (σταθ)</th>
                                <th>Διευθυνση</th>
                                <th>Επωνυμια</th>
                                <th>Ιστοσελιδα</th>
                                <th>Ανανεωση (Y-m-d)</th>
                            </tr>
                        </thead> 
                        <tbody>
                            @for ($i = 0; $i < $totalClients; $i++) 
                            <tr>
                                <td>
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

                                <td> <?php echo $data[$i]->clientId; ?> </td>
                                <td> <?php echo $data[$i]->clientFirstname; ?> </td>
                                <td> <?php echo $data[$i]->clientSurname; ?> </td>
                                <td> <?php echo $data[$i]->clientEmail; ?> </td>
                                <td> <?php echo $data[$i]->clientMobile; ?> </td>
                                <td> <?php echo $data[$i]->clientPhone; ?> </td>
                                <td> <?php echo $data[$i]->clientAdrress; ?> </td>
                                <td> <?php echo $data[$i]->companyName; ?> </td>
                                <td > <a target="_blank" href="https://www.<?php echo $data[$i]->websiteURL; ?>"><i class="fa fa-globe fa-2x" aria-hidden="true"></i> </a> </td>

                                <?php
                                    // Get current date
                                    $cDate = date('Y-m-d');
                                    $cTime = strtotime($cDate);
                                    // Get renew date
                                    $rDate = $data[$i]->renewDate;
                                    $rTime = strtotime($rDate);
                                    $secs =  $cTime -  $rTime;
                                    $days = $secs / 86400;

                                    if( $days < 30) {
                                        echo "<td style=\"background: red; color: white; animation: blinker 1s linear infinite;\" id=\"renewDate\">" . $rDate . "</td>";
                                    }else {
                                        echo "<td id=\"renewDate\">" . $rDate . "</td>";
                                    }
                                ?>
                                
                            </tr>
                           
                            @endfor
                        </tbody>
                    </table> <!-- End of client-table -->
                </div> <!-- End of section-body -->
            </div> <!-- End of section-area -->
        </div> <!-- End of col-md-14 -->
    </div>  <!-- End of row -->
</div> <!-- End of container-fluid -->
@endsection
