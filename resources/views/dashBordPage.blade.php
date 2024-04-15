@extends('index')
@section('Content')
<div class="container">
    <div class="dashbordHome">
        <div class="partyNav">
            <ul>
                <li id="focueBtn">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="34" viewBox="0 0 40 34" fill="none">
                        <path d="M16 34V22H24V34H34V18H40L20 0L0 18H6V34H16Z" fill="#D9D9D9"/>
                    </svg>
                    </a>

                </li>
                <li >
                    <a href="#" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                        <path d="M42.0597 29.3333H17.631L18.1764 32H40.5446C41.828 32 42.7792 33.1918 42.4948 34.4433L42.0351 36.4663C43.5927 37.2223 44.6667 38.819 44.6667 40.6667C44.6667 43.2668 42.5401 45.3703 39.9313 45.3328C37.4461 45.2971 35.4022 43.2803 35.3351 40.7956C35.2984 39.4383 35.8422 38.2082 36.7353 37.3333H19.2647C20.1294 38.1804 20.6667 39.3605 20.6667 40.6667C20.6667 43.3178 18.456 45.4526 15.7775 45.3282C13.3992 45.2178 11.4649 43.2961 11.3399 40.9184C11.2434 39.0823 12.2096 37.4638 13.6775 36.6196L7.82358 8H2C0.895417 8 0 7.10459 0 6V4.66667C0 3.56209 0.895417 2.66667 2 2.66667H10.5441C11.4942 2.66667 12.3131 3.33509 12.5035 4.26584L13.2673 8H45.9992C47.2826 8 48.2338 9.19175 47.9494 10.4433L44.01 27.7766C43.8031 28.6872 42.9936 29.3333 42.0597 29.3333ZM33.5857 18.6667H30V13.6667C30 13.1144 29.5522 12.6667 29 12.6667H27C26.4477 12.6667 26 13.1144 26 13.6667V18.6667H22.4142C21.5233 18.6667 21.0772 19.7438 21.7072 20.3738L27.2929 25.9595C27.6834 26.35 28.3166 26.35 28.7072 25.9595L34.2929 20.3738C34.9228 19.7438 34.4767 18.6667 33.5857 18.6667Z" fill="#D9D9D9"/>
                      </svg>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="44" viewBox="0 0 48 44" fill="none">
                            <path d="M42.0597 27.3333H17.631L18.1764 30H40.5446C41.828 30 42.7792 31.1918 42.4948 32.4433L42.0351 34.4663C43.5927 35.2223 44.6667 36.819 44.6667 38.6667C44.6667 41.2668 42.5401 43.3703 39.9313 43.3328C37.4461 43.2971 35.4022 41.2803 35.3351 38.7956C35.2984 37.4383 35.8422 36.2082 36.7353 35.3333H19.2647C20.1294 36.1804 20.6667 37.3605 20.6667 38.6667C20.6667 41.3178 18.456 43.4526 15.7775 43.3282C13.3992 43.2178 11.4649 41.2961 11.3399 38.9184C11.2434 37.0823 12.2096 35.4638 13.6775 34.6196L7.82358 6H2C0.895417 6 0 5.10459 0 4V2.66667C0 1.56209 0.895417 0.666672 2 0.666672H10.5441C11.4942 0.666672 12.3131 1.33509 12.5035 2.26584L13.2673 6H45.9992C47.2826 6 48.2338 7.19175 47.9494 8.44325L44.01 25.7766C43.8031 26.6872 42.9936 27.3333 42.0597 27.3333ZM34 14.6667H30V11.3333C30 10.5969 29.4031 10 28.6667 10H27.3333C26.5969 10 26 10.5969 26 11.3333V14.6667H22C21.2636 14.6667 20.6667 15.2636 20.6667 16V17.3333C20.6667 18.0698 21.2636 18.6667 22 18.6667H26V22C26 22.7364 26.5969 23.3333 27.3333 23.3333H28.6667C29.4031 23.3333 30 22.7364 30 22V18.6667H34C34.7364 18.6667 35.3333 18.0698 35.3333 17.3333V16C35.3333 15.2636 34.7364 14.6667 34 14.6667Z" fill="#D9D9D9"/>
                          </svg>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
                        <path d="M12 39C9.8 39 7.91667 38.2411 6.35 36.7234C4.78333 35.2057 4 33.3813 4 31.25V15.75C4 13.6188 4.78333 11.7943 6.35 10.2766C7.91667 8.75885 9.8 8 12 8H36C38.2 8 40.0833 8.75885 41.65 10.2766C43.2167 11.7943 44 13.6188 44 15.75V31.25C44 33.3813 43.2167 35.2057 41.65 36.7234C40.0833 38.2411 38.2 39 36 39H12ZM12 15.75H36C36.7333 15.75 37.4333 15.8307 38.1 15.9922C38.7667 16.1536 39.4 16.412 40 16.7672V15.75C40 14.6844 39.6087 13.7725 38.826 13.0142C38.042 12.2547 37.1 11.875 36 11.875H12C10.9 11.875 9.95867 12.2547 9.176 13.0142C8.392 13.7725 8 14.6844 8 15.75V16.7672C8.6 16.412 9.23333 16.1536 9.9 15.9922C10.5667 15.8307 11.2667 15.75 12 15.75ZM8.3 22.0469L30.55 27.2781C30.85 27.3427 31.15 27.3427 31.45 27.2781C31.75 27.2135 32.0333 27.0844 32.3 26.8906L39.25 21.2719C38.8833 20.7875 38.4167 20.3923 37.85 20.0861C37.2833 19.7787 36.6667 19.625 36 19.625H12C11.1333 19.625 10.3753 19.8426 9.726 20.2779C9.07533 20.7145 8.6 21.3042 8.3 22.0469Z" fill="#D9D9D9"/>
                      </svg></a>
                </li>
                <li>
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="49" height="48" viewBox="0 0 49 48" fill="none">
                        <path d="M39.1343 25.88C39.2141 25.28 39.2541 24.66 39.2541 24C39.2541 23.36 39.2141 22.72 39.1143 22.12L43.1679 18.96C43.5274 18.68 43.6272 18.14 43.4076 17.74L39.5736 11.1C39.3339 10.66 38.8347 10.52 38.3954 10.66L33.6229 12.58C32.6244 11.82 31.5661 11.18 30.3879 10.7L29.6691 5.61999C29.5892 5.13999 29.1898 4.79999 28.7106 4.79999H21.0426C20.5633 4.79999 20.1839 5.13999 20.104 5.61999L19.3852 10.7C18.207 11.18 17.1287 11.84 16.1502 12.58L11.3777 10.66C10.9384 10.5 10.4392 10.66 10.1995 11.1L6.3855 17.74C6.14588 18.16 6.22575 18.68 6.62513 18.96L10.6788 22.12C10.5789 22.72 10.4991 23.38 10.4991 24C10.4991 24.62 10.539 25.28 10.6388 25.88L6.58519 29.04C6.22575 29.32 6.12591 29.86 6.34556 30.26L10.1796 36.9C10.4192 37.34 10.9184 37.48 11.3577 37.34L16.1303 35.42C17.1287 36.18 18.187 36.82 19.3652 37.3L20.0841 42.38C20.1839 42.86 20.5633 43.2 21.0426 43.2H28.7106C29.1898 43.2 29.5892 42.86 29.6491 42.38L30.368 37.3C31.5461 36.82 32.6244 36.18 33.6029 35.42L38.3754 37.34C38.8148 37.5 39.314 37.34 39.5536 36.9L43.3876 30.26C43.6272 29.82 43.5274 29.32 43.148 29.04L39.1343 25.88ZM24.8766 31.2C20.9228 31.2 17.6878 27.96 17.6878 24C17.6878 20.04 20.9228 16.8 24.8766 16.8C28.8304 16.8 32.0653 20.04 32.0653 24C32.0653 27.96 28.8304 31.2 24.8766 31.2Z" fill="#D9D9D9"/>
                      </svg>
                    </a>
                </li>
            </ul>
            <div class="bntclose">
                <a href="#">


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
                <div class="titleNav">DrogriAbdo</div>
                <div class="ProFileNav">
                    <a href="#">
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
                <div class="minCotrolle">
                            <div class="partyContrBnt">
                                        <div class="bntconfig">
                                            <a href="#">
                                            <img src="{{ asset('Image/Client.png') }}" alt="img">
                                            <div class="titlebtnconf">Ajoute Client</div>
                                            </a>
                                        </div>
                                        <div class="bntconfig">

                                                <a href="#">
                                                    <img src="{{ asset('Image/fornisseu.png') }}" alt="img">
                                                    <div class="titlebtnconf">Ajoute Fournis</div>
                                                    </a>
                                                </div>

                                        <div class="bntconfig">
                                            <a href="#">
                                                <img src="{{ asset('Image/Products.png') }}" alt="img">
                                                <div class="titlebtnconf">Ajoute Produit</div>
                                            </a>
                                        </div>
                                        <div class="bntconfig">
                                            <a href="#">
                                                <img src="{{ asset('Image/Paymentmethod.png') }}" alt="img">
                                                <div class="titlebtnconf"> Pay Client </div>
                                            </a>
                                        </div>
                                        <div class="bntconfig">
                                            <a href="#">
                                                <img src="{{ asset('Image/Money.png') }}" alt="img">
                                                <div class="titlebtnconf">Pay Fourni</div>
                                            </a>
                                        </div>
                                        <div class="bntconfig">
                                            <a href="#">
                                                <img src="{{ asset('Image/Stock.png') }}" alt="img">
                                                <div class="titlebtnconf"> Voir stock</div>
                                            </a>
                                        </div>

                            </div>
                    <div class="partycalendre"></div>
                </div>
                <div class="userProfil">
                    <div class="profile">
                        <svg xmlns="http://www.w3.org/2000/svg" width="125" height="125" viewBox="0 0 125 125" fill="none">
                            <g clip-path="url(#clip0_4_7)">
                              <path d="M62.5 70.3125C81.9092 70.3125 97.6562 54.5654 97.6562 35.1562C97.6562 15.7471 81.9092 0 62.5 0C43.0908 0 27.3438 15.7471 27.3438 35.1562C27.3438 54.5654 43.0908 70.3125 62.5 70.3125ZM93.75 78.125H80.2979C74.8779 80.6152 68.8477 82.0312 62.5 82.0312C56.1523 82.0312 50.1465 80.6152 44.7021 78.125H31.25C13.9893 78.125 0 92.1143 0 109.375V113.281C0 119.751 5.24902 125 11.7188 125H113.281C119.751 125 125 119.751 125 113.281V109.375C125 92.1143 111.011 78.125 93.75 78.125Z" fill="#D9D9D9" fill-opacity="0.7"/>
                            </g>
                            <defs>
                              <clipPath id="clip0_4_7">
                                <rect width="125" height="125" fill="white"/>
                              </clipPath>
                            </defs>
                          </svg>
                    </div>
                    <div class="Nomomplet">{{ session()->get('Nom_Complet') }}
                        <div class="TotalPrix"><span>&dollar;</span>5000</div>
                    </div>

                    <div class="editBar">
                        <ul>
                            <li>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                    <path d="M10.5 15C13.8141 15 16.5 12.3141 16.5 9C16.5 5.68594 13.8141 3 10.5 3C7.18594 3 4.5 5.68594 4.5 9C4.5 12.3141 7.18594 15 10.5 15ZM14.7 16.5H13.9172C12.8766 16.9781 11.7188 17.25 10.5 17.25C9.28125 17.25 8.12813 16.9781 7.08281 16.5H6.3C2.82187 16.5 0 19.3219 0 22.8V24.75C0 25.9922 1.00781 27 2.25 27H15.1359C15.0234 26.6812 14.9766 26.3438 15.0141 26.0016L15.3328 23.1469L15.3891 22.6266L15.7594 22.2562L19.3828 18.6328C18.2344 17.3344 16.5703 16.5 14.7 16.5ZM16.8234 23.3109L16.5047 26.1703C16.4531 26.6484 16.8563 27.0516 17.3297 26.9953L20.1844 26.6766L26.6484 20.2125L23.2875 16.8516L16.8234 23.3109ZM29.6719 15.6047L27.8953 13.8281C27.4594 13.3922 26.7469 13.3922 26.3109 13.8281L24.5391 15.6L24.3469 15.7922L27.7125 19.1531L29.6719 17.1937C30.1078 16.7531 30.1078 16.0453 29.6719 15.6047Z" fill="#D9D9D9"/>
                                </svg>
                                </a>
                        </li>
                            <li>
                                <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                    <path d="M15.5 16.75C15.8542 16.75 16.1513 16.63 16.3913 16.39C16.6304 16.1508 16.75 15.8542 16.75 15.5V10.4688C16.75 10.1146 16.6304 9.82292 16.3913 9.59375C16.1513 9.36458 15.8542 9.25 15.5 9.25C15.1458 9.25 14.8492 9.36958 14.61 9.60875C14.37 9.84875 14.25 10.1458 14.25 10.5V15.5312C14.25 15.8854 14.37 16.1771 14.61 16.4062C14.8492 16.6354 15.1458 16.75 15.5 16.75ZM15.5 21.75C15.8542 21.75 16.1513 21.63 16.3913 21.39C16.6304 21.1508 16.75 20.8542 16.75 20.5C16.75 20.1458 16.6304 19.8487 16.3913 19.6087C16.1513 19.3696 15.8542 19.25 15.5 19.25C15.1458 19.25 14.8492 19.3696 14.61 19.6087C14.37 19.8487 14.25 20.1458 14.25 20.5C14.25 20.8542 14.37 21.1508 14.61 21.39C14.8492 21.63 15.1458 21.75 15.5 21.75ZM15.5 28C13.7708 28 12.1458 27.6717 10.625 27.015C9.10417 26.3592 7.78125 25.4688 6.65625 24.3438C5.53125 23.2188 4.64083 21.8958 3.985 20.375C3.32833 18.8542 3 17.2292 3 15.5C3 13.7708 3.32833 12.1458 3.985 10.625C4.64083 9.10417 5.53125 7.78125 6.65625 6.65625C7.78125 5.53125 9.10417 4.64042 10.625 3.98375C12.1458 3.32792 13.7708 3 15.5 3C17.2292 3 18.8542 3.32792 20.375 3.98375C21.8958 4.64042 23.2188 5.53125 24.3438 6.65625C25.4688 7.78125 26.3592 9.10417 27.015 10.625C27.6717 12.1458 28 13.7708 28 15.5C28 17.2292 27.6717 18.8542 27.015 20.375C26.3592 21.8958 25.4688 23.2188 24.3438 24.3438C23.2188 25.4688 21.8958 26.3592 20.375 27.015C18.8542 27.6717 17.2292 28 15.5 28Z" fill="#D9D9D9"/>
                                  </svg>
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                        <g clip-path="url(#clip0_8_231)">
                                          <path d="M7.5 23.75C7.5 25.125 8.625 26.25 10 26.25H20C21.375 26.25 22.5 25.125 22.5 23.75V8.75H7.5V23.75ZM23.75 5H19.375L18.125 3.75H11.875L10.625 5H6.25V7.5H23.75V5Z" fill="#D9D9D9"/>
                                        </g>
                                        <defs>
                                          <clipPath id="clip0_8_231">
                                            <rect width="30" height="30" fill="white"/>
                                          </clipPath>
                                        </defs>
                                      </svg>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="titlemaessage">
                            Notification
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 30 30" fill="none">
                                    <g clip-path="url(#clip0_8_236)">
                                      <path d="M9.47498 5.1L7.68748 3.3125C4.68748 5.6 2.71248 9.125 2.53748 13.125H5.03748C5.22498 9.8125 6.92498 6.9125 9.47498 5.1ZM24.9625 13.125H27.4625C27.275 9.125 25.3 5.6 22.3125 3.3125L20.5375 5.1C23.0625 6.9125 24.775 9.8125 24.9625 13.125ZM22.5 13.75C22.5 9.9125 20.45 6.7 16.875 5.85V5C16.875 3.9625 16.0375 3.125 15 3.125C13.9625 3.125 13.125 3.9625 13.125 5V5.85C9.53748 6.7 7.49998 9.9 7.49998 13.75V20L4.99998 22.5V23.75H25V22.5L22.5 20V13.75ZM15 27.5C15.175 27.5 15.3375 27.4875 15.5 27.45C16.3125 27.275 16.975 26.725 17.3 25.975C17.425 25.675 17.4875 25.35 17.4875 25H12.4875C12.5 26.375 13.6125 27.5 15 27.5Z" fill="#D9D9D9"/>
                                    </g>
                                    <defs>
                                      <clipPath id="clip0_8_236">
                                        <rect width="30" height="30" fill="white"/>
                                      </clipPath>
                                    </defs>
                                  </svg>
                            </span>
                        </div>
                    <div class="partymessage">

                        <div class="message">
                            <div class="contentmessage">
                                imply dummy text of the printing and typesetting industry.
                             Lorem Ipsum has been the industry's standard dummy text ever since
                            </div>

                        </div>
                        <div class="message">
                            <div class="contentmessage">
                                imply dummy text of the printing and typesetting industry.
                             Lorem Ipsum has been the industry's standard dummy text ever since
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>


    </div>

</div>

@endsection