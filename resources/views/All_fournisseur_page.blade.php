
@extends('index')
@section('script')
<link href="https://unpkg.com/tabulator-tables@6.2.0/dist/css/tabulator.min.css" rel="stylesheet">
<script type="text/javascript" src="https://unpkg.com/tabulator-tables@6.2.0/dist/js/tabulator.min.js"></script>
<link href="/dist/css/tabulator_simple.min.css" rel="stylesheet">
@endsection
@section('Content')
<div class="container">
    <div class="dashbordHome">
        <div class="partyNav">
            <ul>
                <li id="focueBtn">
                    <a href="{{ route('DashBord_user') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="34" viewBox="0 0 40 34" fill="none">
                        <path d="M16 34V22H24V34H34V18H40L20 0L0 18H6V34H16Z" fill="#D9D9D9"/>
                    </svg>
                    </a>

                </li>
                <li  >
                    <a href="{{ route('Vente') }}" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                        <path d="M42.0597 29.3333H17.631L18.1764 32H40.5446C41.828 32 42.7792 33.1918 42.4948 34.4433L42.0351 36.4663C43.5927 37.2223 44.6667 38.819 44.6667 40.6667C44.6667 43.2668 42.5401 45.3703 39.9313 45.3328C37.4461 45.2971 35.4022 43.2803 35.3351 40.7956C35.2984 39.4383 35.8422 38.2082 36.7353 37.3333H19.2647C20.1294 38.1804 20.6667 39.3605 20.6667 40.6667C20.6667 43.3178 18.456 45.4526 15.7775 45.3282C13.3992 45.2178 11.4649 43.2961 11.3399 40.9184C11.2434 39.0823 12.2096 37.4638 13.6775 36.6196L7.82358 8H2C0.895417 8 0 7.10459 0 6V4.66667C0 3.56209 0.895417 2.66667 2 2.66667H10.5441C11.4942 2.66667 12.3131 3.33509 12.5035 4.26584L13.2673 8H45.9992C47.2826 8 48.2338 9.19175 47.9494 10.4433L44.01 27.7766C43.8031 28.6872 42.9936 29.3333 42.0597 29.3333ZM33.5857 18.6667H30V13.6667C30 13.1144 29.5522 12.6667 29 12.6667H27C26.4477 12.6667 26 13.1144 26 13.6667V18.6667H22.4142C21.5233 18.6667 21.0772 19.7438 21.7072 20.3738L27.2929 25.9595C27.6834 26.35 28.3166 26.35 28.7072 25.9595L34.2929 20.3738C34.9228 19.7438 34.4767 18.6667 33.5857 18.6667Z" fill="#D9D9D9"/>
                      </svg>
                    </a>
                </li>
                <li>
                    <a href="{{ route('Achat') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="44" viewBox="0 0 48 44" fill="none">
                            <path d="M42.0597 27.3333H17.631L18.1764 30H40.5446C41.828 30 42.7792 31.1918 42.4948 32.4433L42.0351 34.4663C43.5927 35.2223 44.6667 36.819 44.6667 38.6667C44.6667 41.2668 42.5401 43.3703 39.9313 43.3328C37.4461 43.2971 35.4022 41.2803 35.3351 38.7956C35.2984 37.4383 35.8422 36.2082 36.7353 35.3333H19.2647C20.1294 36.1804 20.6667 37.3605 20.6667 38.6667C20.6667 41.3178 18.456 43.4526 15.7775 43.3282C13.3992 43.2178 11.4649 41.2961 11.3399 38.9184C11.2434 37.0823 12.2096 35.4638 13.6775 34.6196L7.82358 6H2C0.895417 6 0 5.10459 0 4V2.66667C0 1.56209 0.895417 0.666672 2 0.666672H10.5441C11.4942 0.666672 12.3131 1.33509 12.5035 2.26584L13.2673 6H45.9992C47.2826 6 48.2338 7.19175 47.9494 8.44325L44.01 25.7766C43.8031 26.6872 42.9936 27.3333 42.0597 27.3333ZM34 14.6667H30V11.3333C30 10.5969 29.4031 10 28.6667 10H27.3333C26.5969 10 26 10.5969 26 11.3333V14.6667H22C21.2636 14.6667 20.6667 15.2636 20.6667 16V17.3333C20.6667 18.0698 21.2636 18.6667 22 18.6667H26V22C26 22.7364 26.5969 23.3333 27.3333 23.3333H28.6667C29.4031 23.3333 30 22.7364 30 22V18.6667H34C34.7364 18.6667 35.3333 18.0698 35.3333 17.3333V16C35.3333 15.2636 34.7364 14.6667 34 14.6667Z" fill="#D9D9D9"/>
                          </svg>
                    </a>
                </li>
                <li >
                    <a href="{{ route('Voir_Credi',['clientOrFrouni'=>'client']) }}" id="focueBtn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                        <path d="M12 39C9.8 39 7.91667 38.2411 6.35 36.7234C4.78333 35.2057 4 33.3813 4 31.25V15.75C4 13.6188 4.78333 11.7943 6.35 10.2766C7.91667 8.75885 9.8 8 12 8H36C38.2 8 40.0833 8.75885 41.65 10.2766C43.2167 11.7943 44 13.6188 44 15.75V31.25C44 33.3813 43.2167 35.2057 41.65 36.7234C40.0833 38.2411 38.2 39 36 39H12ZM12 15.75H36C36.7333 15.75 37.4333 15.8307 38.1 15.9922C38.7667 16.1536 39.4 16.412 40 16.7672V15.75C40 14.6844 39.6087 13.7725 38.826 13.0142C38.042 12.2547 37.1 11.875 36 11.875H12C10.9 11.875 9.95867 12.2547 9.176 13.0142C8.392 13.7725 8 14.6844 8 15.75V16.7672C8.6 16.412 9.23333 16.1536 9.9 15.9922C10.5667 15.8307 11.2667 15.75 12 15.75ZM8.3 22.0469L30.55 27.2781C30.85 27.3427 31.15 27.3427 31.45 27.2781C31.75 27.2135 32.0333 27.0844 32.3 26.8906L39.25 21.2719C38.8833 20.7875 38.4167 20.3923 37.85 20.0861C37.2833 19.7787 36.6667 19.625 36 19.625H12C11.1333 19.625 10.3753 19.8426 9.726 20.2779C9.07533 20.7145 8.6 21.3042 8.3 22.0469Z" fill="#D9D9D9"/>
                      </svg></a>
                </li>
                <li>
                    <a href="{{ route('parametre_page') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="49" height="48" viewBox="0 0 49 48" fill="none">
                        <path d="M39.1343 25.88C39.2141 25.28 39.2541 24.66 39.2541 24C39.2541 23.36 39.2141 22.72 39.1143 22.12L43.1679 18.96C43.5274 18.68 43.6272 18.14 43.4076 17.74L39.5736 11.1C39.3339 10.66 38.8347 10.52 38.3954 10.66L33.6229 12.58C32.6244 11.82 31.5661 11.18 30.3879 10.7L29.6691 5.61999C29.5892 5.13999 29.1898 4.79999 28.7106 4.79999H21.0426C20.5633 4.79999 20.1839 5.13999 20.104 5.61999L19.3852 10.7C18.207 11.18 17.1287 11.84 16.1502 12.58L11.3777 10.66C10.9384 10.5 10.4392 10.66 10.1995 11.1L6.3855 17.74C6.14588 18.16 6.22575 18.68 6.62513 18.96L10.6788 22.12C10.5789 22.72 10.4991 23.38 10.4991 24C10.4991 24.62 10.539 25.28 10.6388 25.88L6.58519 29.04C6.22575 29.32 6.12591 29.86 6.34556 30.26L10.1796 36.9C10.4192 37.34 10.9184 37.48 11.3577 37.34L16.1303 35.42C17.1287 36.18 18.187 36.82 19.3652 37.3L20.0841 42.38C20.1839 42.86 20.5633 43.2 21.0426 43.2H28.7106C29.1898 43.2 29.5892 42.86 29.6491 42.38L30.368 37.3C31.5461 36.82 32.6244 36.18 33.6029 35.42L38.3754 37.34C38.8148 37.5 39.314 37.34 39.5536 36.9L43.3876 30.26C43.6272 29.82 43.5274 29.32 43.148 29.04L39.1343 25.88ZM24.8766 31.2C20.9228 31.2 17.6878 27.96 17.6878 24C17.6878 20.04 20.9228 16.8 24.8766 16.8C28.8304 16.8 32.0653 20.04 32.0653 24C32.0653 27.96 28.8304 31.2 24.8766 31.2Z" fill="#D9D9D9"/>
                      </svg>
                    </a>
                </li>
            </ul>
            <div class="bntclose">
                <a href="{{ route('logOute') }}">


                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                        <g clip-path="url(#clip0_63_11)">
                          <path d="M19.5313 2.6416C22.6074 4.83887 24.6094 8.43262 24.6094 12.5C24.6094 19.1797 19.1992 24.5947 12.5244 24.6094C5.85938 24.624 0.400392 19.1895 0.390626 12.5195C0.385743 8.45215 2.3877 4.84863 5.45899 2.64648C6.03027 2.24121 6.82617 2.41211 7.16797 3.02246L7.93945 4.39453C8.22754 4.90723 8.09082 5.55664 7.61719 5.9082C5.59082 7.41211 4.29688 9.79492 4.29688 12.4951C4.29199 17.002 7.93457 20.7031 12.5 20.7031C16.9727 20.7031 20.7324 17.0801 20.7031 12.4463C20.6885 9.91699 19.4971 7.47559 17.3779 5.90332C16.9043 5.55176 16.7725 4.90234 17.0605 4.39453L17.832 3.02246C18.1738 2.41699 18.9648 2.23633 19.5313 2.6416ZM14.4531 12.8906V1.17188C14.4531 0.522461 13.9307 0 13.2813 0H11.7188C11.0693 0 10.5469 0.522461 10.5469 1.17188V12.8906C10.5469 13.54 11.0693 14.0625 11.7188 14.0625H13.2813C13.9307 14.0625 14.4531 13.54 14.4531 12.8906Z" fill="#F2613F"/>
                        </g>
                        <defs>
                          <clipPath id="clip0_63_11">
                            <rect width="25" height="25" fill="white"/>
                          </clipPath>
                        </defs>
                      </svg>
                </span>
                Se déconnecter</a>
            </div>
        </div>
        <div class="partyContent">
            <div class="navSide">
                <div class="titleNav">Droguerie Issam</div>
                <div class="ProFileNav">
                    <a href="{{ route('parametre_page') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                    <g clip-path="url(#clip0_4_67)">
                      <path d="M15 16.875C19.6582 16.875 23.4375 13.0957 23.4375 8.4375C23.4375 3.7793 19.6582 0 15 0C10.3418 0 6.5625 3.7793 6.5625 8.4375C6.5625 13.0957 10.3418 16.875 15 16.875ZM22.5 18.75H19.2715C17.9707 19.3477 16.5234 19.6875 15 19.6875C13.4766 19.6875 12.0352 19.3477 10.7285 18.75H7.5C3.35742 18.75 0 22.1074 0 26.25V27.1875C0 28.7402 1.25977 30 2.8125 30H27.1875C28.7402 30 30 28.7402 30 27.1875V26.25C30 22.1074 26.6426 18.75 22.5 18.75Z" fill="#D9D9D9" fill-opacity="0.7"/>
                    </g>
                    <defs>
                      <clipPath id="clip0_4_67">
                        <rect width="30" height="30" fill="white"/>
                      </clipPath>
                    </defs>
                  </svg>
                    </a>

                </div>
            </div>
            <div class="sectionConteent">
                <div class="titleAjoute">
                   Fourisseur
                    <a class="btnAjoute" href="{{ route('Ajoute_Fournisseur') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 25 25" fill="none">
                            <path d="M21.875 10.1562H14.8438V3.125C14.8438 2.26221 14.144 1.5625 13.2812 1.5625H11.7188C10.856 1.5625 10.1562 2.26221 10.1562 3.125V10.1562H3.125C2.26221 10.1562 1.5625 10.856 1.5625 11.7188V13.2812C1.5625 14.144 2.26221 14.8438 3.125 14.8438H10.1562V21.875C10.1562 22.7378 10.856 23.4375 11.7188 23.4375H13.2812C14.144 23.4375 14.8438 22.7378 14.8438 21.875V14.8438H21.875C22.7378 14.8438 23.4375 14.144 23.4375 13.2812V11.7188C23.4375 10.856 22.7378 10.1562 21.875 10.1562Z" fill="#F2613F"/>
                          </svg>
                        Ajoute Fourisseur</a>
                </div>
                @if ($errors->any())
                <div class="errorsStyle">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
                @if (session()->has('success'))
                    <div class="messageSucc">{{ session()->get('success') }}</div>
                @endif
                @if (session()->has('errorMessage'))
                    <div class="errorsStyle">{{ session()->get('errorMessage') }}</div>
                @endif


                <div class="sectionAjoutegroupporduit">
                    <div class="sectionTable-1">
                   @if (!$dataFourni )

                        <div class="notFoundMsg">Data Not Found</div>
                    @else
                        <table id="tbld" style="padding: 10px">
                            <thead>
                                <tr>
                                    <th>ID  </th>
                                    <th>Nom Complet</th>
                                    <th>Adresse</th>

                                    <th>Email </th>
                                    <th>Telephone </th>
                                    <th>Montant </th>

                                    <th>delete </th>

                                </tr>
                            </thead>
                            <tbody class="table">


                                    @foreach ($dataFourni as $key=> $itmFourni)
                                    <tr>
                                            <td>{{$itmFourni->id}}</td>
                                            <td >{{  $itmFourni->nom_Complet}}</td>
                                            <td >{{Str::limit($itmFourni->Adresse, 10, '...')  }}</td>

                                            <td>{{Str::limit($itmFourni->email, 10, '...')  }}</td>
                                            <td>{{Str::limit(  $itmFourni->telephone, 6, '...')}}</td>
                                            <td>{{  $itmFourni->Montant}}</td>

                                            <td>
                                                <form action="{{ route('Ajoute_Fournisseur_dl') }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <input type="hidden"  name="idClient" value="{{ $itmFourni->id }}">
                                                    <button id="btnfromdelete" type="submit"><i class="fa-solid fa-trash-can"></i></button>

                                                </form>
                                            </td>


                                        </tr>
                                    @endforeach




                            {{-- {{ dd($dataPrint) }} --}}


                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        @if ($dataFourni)
                                            <div class="paginate">
                                                @if ($dataFourni->lastPage()>1)


                                                        @if ( $dataFourni->currentPage()>$dataFourni->lastPage())

                                                        <a class="bntPrev" href="?page={{ $dataFourni->currentPage()-1 }}"><i class="fa-solid fa-chevron-left"></i></a>
                                                        @endif
                                                        <div class="pageCureent">{{ $dataFourni->currentPage() }}  Page [ {{ $dataFourni->lastPage() }} ]</div>
                                                        @if ( $dataFourni->currentPage()<$dataFourni->lastPage())
                                                        <a class="btnNext" href="?page={{ $dataFourni->currentPage()+1 }}"><i class="fa-solid fa-chevron-right"></i></a>
                                                        @endif
                                                @endif
                                            </div>
                                        @endif



                                    </td>
                                </tr>


                            </tfoot>
                         @endif
                        </table>
                    </div>

                </div>


            </div>
        </div>


    </div>

{{-- </div>
<script>
    const selectproduit = document.getElementById('selectproduit');
    const prix = document.getElementById('prix');
    const quantite = document.getElementById('quantite');
    // selectproduit.onchange=myfinc;
    const myfinc=(data)=>{

     return  data.forEach(element => {
        let dataprix=element.Prix
            if(element.id == selectproduit.value){
                return prix.value=element.Prix
            }else{
                return prix.value=dataprix
            }
          });
    }
    const myfinc2=()=>{
        // console.log(quantite.value ,prix.value);
        let dataprix=prix.value
        dataprixTotal =quantite.value*prix.value
        if(quantite.value>0){
            return prix.value = dataprixTotal
        }else if(quantite.value==0){
            return prix.value = dataprix
        }

    }


</script> --}}
<Script>
    //     const tbale=document.querySelectorAll('.table tr')
    //     console.log(tbale.length);
    //     const myfunprintPor=()=>{
    //         const NumProduit=document.getElementById('NumProduit')
    //         console.log(NumProduit.innerHTML);
    //         return NumProduit.innerHTML=tbale.length;
    //     }
    //     myfunprintPor()
    //     const tbaleprix=document.querySelectorAll('.table tr #prix')
    //     // console.log(tbaleprix);
    //     const myfunprintPrix=(tbaleprix)=>{
    //         const NumPrixTotal=document.getElementById('NumPrixTotal')
    //         let NumPrix=0
    //         tbaleprix.forEach(element => {

    //           return  NumPrix+=parseInt(element.innerHTML)
    //         });
    //         console.log(NumPrixTotal.innerHTML);
    //             return NumPrixTotal.innerHTML=NumPrix
    //         // console.log(NumPrixTotal);
    //         // return NumProduit.innerHTML=tbale.length;
    //     }
    //     myfunprintPrix(tbaleprix)
    //     const selectproduit=document.getElementById('selectproduit')

    //    const myfunselect =(event)=>{
    //     const btnchange=document.getElementById('btnchange');

    //      btnchange.href=`${selectproduit.value}`;



    //           return  btnchange.click();
    //    }

    // const bntnext=document.getElementById('bntnext');
    //     const myfunNext=(event)=>{
    //         console.log(bntnext,event.target.value);
    //         bntnext.href=`${event.target.value}`;
    //         return bntnext.click();
    //     }


</Script>

@endsection
