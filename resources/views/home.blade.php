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
                            <tr>
                                <th id="firstCol">#</th>
                                <th>ID</th>
                                <th>Όνομα</th>
                                <th>Επώνυμο</th>
                                <th>Email</th>
                                <th>Τηλ (κιν)</th>
                                <th>Τηλ (σταθ)</th>
                                <th>Διεύθυνση</th>
                                <th>Εταιρεία</th>
                                <th>Τύπος</th>
                                <th>Υπηρεσίες</th>
                                <th>URL</th>
                                <th>Ανανέωση</th>
                                <th>Συνολο</th>
                                <th>Προκαταβολή</th>
                                <th>Υπόλοιπο</th>
                                <th>Συντήρηση</th>
                                <th id="lastCol">Σχόλια</th>
                            </tr>
                        </thead> 
                        <tbody>
                            @for ($i = 0; $i < $totalClients; $i++) 
                            <tr>
                                <td>
                                    <form method="POST" action="{{URL::to('/update')}}">
                                        {{csrf_field()}}
                                        <input type="hidden" name="rowId" value="<?php echo $i+1; ?>">
                                        <button type="submit" class="editButton">Edit</button>
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
                                <td> <?php echo $data[$i]->companyType; ?> </td>
                                <td> <?php echo $data[$i]->services; ?> </td>
                                <td> <?php echo $data[$i]->websiteURL; ?> </td>
                                <td> <?php echo $data[$i]->renewDate; ?> </td>
                                <td> <?php echo $data[$i]->totalPrice; ?> </td>
                                <td> <?php echo $data[$i]->deposit; ?> </td>
                                <td> <?php echo $data[$i]->balance; ?> </td>
                                <td> <?php echo $data[$i]->serverPrice; ?> </td>
                                <td> <?php echo $data[$i]->comments; ?> </td>
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
