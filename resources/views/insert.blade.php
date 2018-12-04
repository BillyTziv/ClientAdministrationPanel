@extends('layouts.app')

@section('content')
<div class="container-fluid"  >
    <div class="row"  >
        <div class="col-md-12">
            <div class="section-area">
                <!-- Section heading with the bottom line divider -->
                <div class="section-heading">
                    <h1>Εισαγωγή Πελάτη</h1>
                    <div class="section-heading-divider"></div>
                </div>

                <!-- Check the session status -->
                <div class="section-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif

                    <form class="client-form" action="{{URL::to('/insert')}}" method="POST">
                        {{csrf_field()}}

                        <h3 class="subtitle fancy" id="firstSubTitle"><span>Προσωπικά Στοιχεία</span> </h3>
                        <table class="form-section" style="width:100%;">
                            <tr>
                                <td>
                                    <div class="inputWithIcon">
                                        <!-- Get the latest ID and create a new one -->
                                        <?php
                                            $latestID = DB::select('select clientId from clients order by clientId DESC');
                                            $newId = (int)$latestID[0]->clientId + 1;
                                        ?>
                                        <input type="text" name="clientId" value="<?php echo $newId;?>">
                                        <i class="fa fa-id-card fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">ID:</span></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="clientFirstname" placeholder="Πληκτρολογήσε το όνομα...">
                                        <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Όνομα:</span></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="clientSurname" placeholder="Πληκτρολογήσε το επώνυμο...">
                                        <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Επώνυμο:</span></i>
                                    </div>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="clientEmail" placeholder="Πληκτρολογήσε το κυρίως e-mail...">
                                        <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Email:</span></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="clientMobile" placeholder="Πληκτρολογήσε τον αριθμό του κινητού...">
                                        <i class="fa fa-mobile fa-lg fa-fw"  aria-hidden="true"><span class="clientFieldText">Κινητό:</span></i>
                                    </div>
                                </td>
                            </tr>
                        </table>

                        <h3 class="subtitle fancy"><span>Στοιχεία Επιχείρησης</span> </h3>
                        <table class="form-section" style="width: 100%;">
                            <tr>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="clientPhone" placeholder="Πληκτρολογήσε τον αριθμό του σταθερού...">
                                        <i class="fa fa-phone fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Σταθερό:</span></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="clientAdrress" placeholder="Πληκτρολογήσε την διεύθυνση...">
                                        <i class="fa fa-map-marker fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Διεύθυνση:</span></i>
                                    </div>
                                </td>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="companyName" placeholder="Πληκτρολογήσε την επωνυμία της επιχείρησης...">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Επωνυμία:</span></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="companyType" placeholder="Πληκτρολογήσε τον τύπο της επιχείρησης...">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Τύπος:</span></i>
                                    </div></td>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="websiteURL" placeholder="Πληκτρολογήσε το url της ιστοσελίδας...">
                                        <i class="fa fa-globe fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Ιστότοπος:</span></i>
                                    </div>
                                </td>
                            </tr>
                        </table>
            
                        <h3 class="subtitle fancy"><span>Στοιχεία Παροχής Υπηρεσιών</span> </h3>
                        <table class="form-section" style="width: 100%;">
                            <tr>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="services" placeholder="Πληκτρολογήσε τις παρωχημένες υπηρεσίες...">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Υπηρεσίες:</span></i>
                                    </div>
                                </td>
                                <td>   
                                    <div class="inputWithIcon">
                                        <input type="text" name="totalPrice" placeholder="Πληκτρολογήσε την συνολική τιμή...">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Συνολo:</span></i>
                                    </div>
                                </td>
                                <td>   
                                    <div class="inputWithIcon">
                                        <input type="text" name="deposit" placeholder="Πληκτρολογήσε την προκαταβολή...">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Προκαταβολή:</span></i>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="inputWithIcon">
                                        <input type="text" name="balance" placeholder="Πληκτρολογήσε το υπόλοιπο...">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Υπόλοιπο:</span></i>
                                    </div>
                                </td>
                                <td> 
                                    <div class="inputWithIcon">
                                        <input type="text" name="serverPrice" placeholder="Πληκτρολογήσε το κόστος συντήρησης του server...">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Συντήρηση:</span></i>
                                    </div>
                                </td>
                                <td>     
                                    <div class="inputWithIcon">
                                        <input type="text" name="comments" placeholder="Πληκτρολογήσε σχόλια κ σημειώσεις...">
                                        <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Σχόλια:</span></i>
                                    </div>
                                </td>
                        
                            </tr>
                        </table> </br>
                        <table>
                            <tr>
                                <td>
                                    <div class="inputWithIcon">
                                        <label id="dateRenew">Ανανέωση Συνδομής:</label>
                                        <input type="date" name="renewDate">
                                    </div>
                                </td>
                                <td>
                                    <span id="priceText"><i>Τα χρηματικά ποσά είναι σε €</i></span>
                                </td>
                            </tr>
                        </table> </br>
                        
                        <input type="hidden" name="token" value="">
                        <button type="submit" class="submitButton" name="button">Προσθηκη</button></br></br>
                    </form>
                </div> <!-- End of section-body -->
            </div> <!-- End of section-area -->
        </div> <!-- End of col-md-14 -->
    </div>  <!-- End of row -->
</div> <!-- End of container-fluid -->
@endsection