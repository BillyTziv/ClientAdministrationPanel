@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row"  >
        <div  style="float: none;margin: 0 auto; width: 450px;">
            <div class="col-md-12">
            
                <div class="section-area">
                    <!-- Section heading with the bottom line divider -->
                    <div class="section-heading">
                        <h1>Προσωπικά Στοιχεία</h1>
                        <div class="clientUpdateTitleDivider"></div>
                    </div>

                    <!-- Check the session status -->
                    <div class="section-body">
                        @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                        @endif
                        

                        <form class="client-form" action="{{URL::to('/updateClient')}}" method="POST">
                            {{csrf_field()}}
                            <img style="display: block;  margin-left: auto; margin-right: auto;" width="150px" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/Circle-icons-profile.svg/768px-Circle-icons-profile.svg.png">
                            </br>

                            <table class="form-section" style="width:100%;">
                                <tr>
                                    <input style="margin: auto;" type="file" name="fileToUpload" id="fileToUpload"></br>
                                </tr>
                                <tr>
                                    <div class="inputWithIcon">
                                        <input type="text" name="clientId" value="{{$clientId}}">
                                        <i class="fa fa-id-card fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">ID:</span></i>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="inputWithIcon">
                                        <input type="text" name="clientFirstname" value="{{$clientFirstname}}" placeholder="Πληκτρολογήσε το όνομα...">
                                        <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Όνομα:</span></i>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="inputWithIcon">
                                        <input type="text" name="clientSurname" value="{{$clientSurname}}" placeholder="Πληκτρολογήσε το επώνυμο...">
                                        <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Επώνυμο:</span></i>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="inputWithIcon">
                                        <input type="text" name="clientEmail" value="{{$clientEmail}}" placeholder="Πληκτρολογήσε το κυρίως e-mail...">
                                        <i class="fa fa-envelope fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Email:</span></i>
                                    </div>
                                </tr>
                                <tr>
                                    <div class="inputWithIcon">
                                        <input type="text" name="clientMobile" value="{{$clientMobile}}" placeholder="Πληκτρολογήσε τον αριθμό του κινητού...">
                                        <i class="fa fa-phone fa-lg fa-fw"  aria-hidden="true"><span class="clientFieldText">Κινητό:</span></i>
                                    </div>
                                </tr>
                            </table>
    <!--
                            <h3 class="subtitle fancy"><span>Στοιχεία Επιχείρησης</span> </h3>
                            <table class="form-section" style="width: 100%;">
                                <tr>
                                    <<td>
                                        <div class="inputWithIcon">
                                            <input type="text" name="clientPhone" value="clientPhone" placeholder="Πληκτρολογήσε τον αριθμό του σταθερού...">
                                            <i class="fa fa-phone fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Σταθερό:</span></i>
                                        </div>
                                    </td>-
                                    <td>
                                        <div class="inputWithIcon">
                                            <input type="text" name="clientAdrress" value="clientAdrress}}" placeholder="Πληκτρολογήσε την διεύθυνση...">
                                            <i class="fa fa-map-marker fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Διεύθυνση:</span></i>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="inputWithIcon">
                                            <input type="text" name="companyName" value="companyName}}" placeholder="Πληκτρολογήσε την επωνυμία της επιχείρησης...">
                                            <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Επωνυμία:</span></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="inputWithIcon">
                                            <input type="text" name="companyType" value="companyType}}" placeholder="Πληκτρολογήσε τον τύπο της επιχείρησης...">
                                            <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Τύπος:</span></i>
                                        </div></td>
                                    <td>
                                        <div class="inputWithIcon">
                                            <input type="text" name="websiteURL" value="websiteURL}}" placeholder="Πληκτρολογήσε το url της ιστοσελίδας...">
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
                                            <input type="text" name="services" value="services}}" placeholder="Πληκτρολογήσε τις παρωχημένες υπηρεσίες...">
                                            <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Υπηρεσία:</span></i>
                                        </div>
                                    </td>
                                    <td>   
                                        <div class="inputWithIcon">
                                            <input type="text" name="totalPrice" value="totalPrice}}" placeholder="Πληκτρολογήσε την συνολική τιμή...">
                                            <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Συνολo:</span></i>
                                        </div>
                                    </td>
                                    <td>   
                                        <div class="inputWithIcon">
                                            <input type="text" name="deposit" value="deposit}}" placeholder="Πληκτρολογήσε την προκαταβολή...">
                                            <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Προ/βολή:</span></i>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="inputWithIcon">
                                            <input type="text" name="balance" value="balance}}" placeholder="Πληκτρολογήσε το υπόλοιπο...">
                                            <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Υπόλοιπο:</span></i>
                                        </div>
                                    </td>
                                    <td> 
                                        <div class="inputWithIcon">
                                            <input type="text" name="serverPrice" value="serverPrice}}" placeholder="Πληκτρολογήσε το κόστος συντήρησης του server...">
                                            <i class="fa fa-building fa-lg fa-fw" aria-hidden="true"><span class="clientFieldText">Συντήρηση:</span></i>
                                        </div>
                                    </td>
                                    <td>     
                                        <div class="inputWithIcon">
                                            <input type="text" name="comments" value="comments}}" placeholder="Πληκτρολογήσε σχόλια κ σημειώσεις...">
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
                                            <?php
                                                //echo "START: " . $renewDate;
                                                //$repDate = str_replace('/', '-', $renewDate);
                                            // $transDate = date('Y-m-d', strtotime($repDate));
                                            ?>
                                        
                                            <input type="date" name="renewDate" value="<?php //echo $transDate; ?>">
                                        </div>
                                    </td>
                                    <td>
                                        <span id="priceText"><i>Τα χρηματικά ποσά είναι σε €</i></span>
                                    </td>
                                </tr>
                            </table> </br>
                            -->
                            <input type="hidden" name="token" value="">
                            <input type="hidden" name="selRowId" value="{{$selRow}}"></br>

                            <table>
                                <tr>
                                    <td style="width: 225px;">
                                        <a href="{{URL::to('/home')}}" style="margin:auto; display:block;" class="homeButton">Πισω</a>
                                    </td>
                                    <td style="width: 225px;">
                                        <button style="margin:auto; display:block;" type="submit" class="submitButton" name="button">Ενημερωση</button>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div> <!-- End of section-body -->
                </div> <!-- End of section-area -->
            </div>
        </div> <!-- End of col-md-6 -->
    </div>  <!-- End of row -->
</div> <!-- End of container-fluid -->
@endsection