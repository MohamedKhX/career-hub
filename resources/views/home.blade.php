<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="msapplication-TileColor" content="#0E0E0E">
    <meta name="template-color" content="#0E0E0E">
    <link rel="manifest" href="manifest.json" crossorigin>
    <meta name="msapplication-config" content="browserconfig.xml">
    <meta name="description" content="Index page">
    <meta name="keywords" content="index, page">
    <meta name="author" content="">
    <link rel="shortcut icon" type="image/x-icon" href="assets/imgs/template/favicon.svg">
    <link href="assets/css/style.css?version=4.1" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Rubik', sans-serif !important;
        }
    </style>
    <title>Career hub</title>
</head>

<body>
<div id="preloader-active">
    <div class="preloader d-flex align-items-center justify-content-center">
        <div class="preloader-inner position-relative">
            <div class="text-center"><img src="assets/imgs/template/loading.gif" alt="jobBox"></div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalApplyJobForm" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content apply-job-form">
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body pl-30 pr-30 pt-50">
                <div class="text-center">
                    <p class="font-sm text-brand-2">Job Application </p>
                    <h2 class="mt-10 mb-5 text-brand-1 text-capitalize">Start your career today</h2>
                    <p class="font-sm text-muted mb-30">Please fill in your information and send it to the employer. </p>
                </div>
                <form class="login-register text-start mt-20 pb-30" action="#">
                    <div class="form-group">
                        <label class="form-label" for="input-1">Full Name *</label>
                        <input class="form-control" id="input-1" type="text" required="" name="fullname" placeholder="Steven Job">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="input-2">Email *</label>
                        <input class="form-control" id="input-2" type="email" required="" name="emailaddress" placeholder="stevenjob@gmail.com">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="number">Contact Number *</label>
                        <input class="form-control" id="number" type="text" required="" name="phone" placeholder="(+01) 234 567 89">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="des">Description</label>
                        <input class="form-control" id="des" type="text" required="" name="Description" placeholder="Your description...">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="file">Upload Resume</label>
                        <input class="form-control" id="file" name="resume" type="file">
                    </div>
                    <div class="login_footer form-group d-flex justify-content-between">
                        <label class="cb-container">
                            <input type="checkbox"><span class="text-small">Agree our terms and policy</span><span class="checkmark"></span>
                        </label><a class="text-muted" href="page-contact.html">Lean more</a>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-default hover-up w-100" type="submit" name="login">Apply Job</button>
                    </div>
                    <div class="text-muted text-center">Do you need support? <a href="page-contact.html">Contact Us</a></div>
                </form>
            </div>
        </div>
    </div>
</div>
<header class="header sticky-bar">
    <div class="container">
        <div class="main-header">
            <div class="header-left">
                <div class="header-logo"><a class="d-flex" href="index.html"><img alt="jobBox" src="assets/imgs/template/jobhub-logo.svg"></a></div>
            </div>
            <div class="header-nav">
                <nav class="nav-main-menu">
                    <ul class="main-menu">
                        <li class="" style="font-size: 17px !important;">
                            <a href="companies-grid.html">الأقسام</a>
                        </li>
                        <li class="">
                            <a href="companies-grid.html">الشركات</a>
                        </li>
                        <li class="">
                            <a href="jobs-grid.html">ابحث عن وظيفة</a>
                        </li>
                        <li class="">
                            <a class="active" href="index.html">الرئيسية</a>
                        </li>
                    </ul>
                </nav>
                <div class="burger-icon burger-icon-white"><span class="burger-icon-top"></span><span class="burger-icon-mid"></span><span class="burger-icon-bottom"></span></div>
            </div>
            <div class="header-right">
                <div class="block-signin"><a class="text-link-bd-btom hover-up" href="page-register.html">إنشاء حساب</a><a class="btn btn-default btn-shadow ml-40 hover-up" href="page-signin.html">تسجيل الدخول</a></div>
            </div>
        </div>
    </div>
</header><div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
            <div class="perfect-scroll">
                <div class="mobile-search mobile-header-border mb-30">
                    <form action="#">
                        <input type="text" placeholder="Search…"><i class="fi-rr-search"></i>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start-->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="has-children"><a class="active" href="index.html">Home</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Home 1</a></li>
                                    <li><a href="index-2.html">Home 2</a></li>
                                    <li><a href="index-3.html">Home 3</a></li>
                                    <li><a href="index-4.html">Home 4</a></li>
                                    <li><a href="index-5.html">Home 5</a></li>
                                    <li><a href="index-6.html">Home 6</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="jobs-grid.html">Find a Job</a>
                                <ul class="sub-menu">
                                    <li><a href="jobs-grid.html">Jobs Grid</a></li>
                                    <li><a href="jobs-list.html">Jobs List</a></li>
                                    <li><a href="job-details.html">Jobs Details  </a></li>
                                    <li><a href="job-details-2.html">Jobs Details 2              </a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="companies-grid.html">Recruiters</a>
                                <ul class="sub-menu">
                                    <li><a href="companies-grid.html">Recruiters</a></li>
                                    <li><a href="company-details.html">Company Details</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="candidates-grid.html">Candidates</a>
                                <ul class="sub-menu">
                                    <li><a href="candidates-grid.html">Candidates Grid</a></li>
                                    <li><a href="candidate-details.html">Candidate Details</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="blog-grid.html">Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="page-about.html">About Us</a></li>
                                    <li><a href="page-pricing.html">Pricing Plan</a></li>
                                    <li><a href="page-contact.html">Contact Us</a></li>
                                    <li><a href="page-register.html">Register</a></li>
                                    <li><a href="page-signin.html">Signin</a></li>
                                    <li><a href="page-reset-password.html">Reset Password</a></li>
                                    <li><a href="page-content-protected.html">Content Protected</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="blog-grid.html">Blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-grid.html">Blog Grid</a></li>
                                    <li><a href="blog-grid-2.html">Blog Grid 2</a></li>
                                    <li><a href="blog-details.html">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="http://wp.alithemes.com/html/jobbox/demos/dashboard" target="_blank">Dashboard</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-account">
                    <h6 class="mb-10">Your Account</h6>
                    <ul class="mobile-menu font-heading">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Work Preferences</a></li>
                        <li><a href="#">Account Settings</a></li>
                        <li><a href="#">Go Pro</a></li>
                        <li><a href="page-signin.html">Sign Out</a></li>
                    </ul>
                </div>
                <div class="site-copyright">Copyright 2022 &copy; JobBox. <br>Designed by AliThemes.</div>
            </div>
        </div>
    </div>
</div>
<div class="mobile-header-active mobile-header-wrapper-style perfect-scrollbar">
    <div class="mobile-header-wrapper-inner">
        <div class="mobile-header-content-area">
            <div class="perfect-scroll">
                <div class="mobile-search mobile-header-border mb-30">
                    <form action="#">
                        <input type="text" placeholder="Search…"><i class="fi-rr-search"></i>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start-->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="has-children"><a class="active" href="index.html">Home</a>
                                <ul class="sub-menu">
                                    <li><a href="index.html">Home 1</a></li>
                                    <li><a href="index-2.html">Home 2</a></li>
                                    <li><a href="index-3.html">Home 3</a></li>
                                    <li><a href="index-4.html">Home 4</a></li>
                                    <li><a href="index-5.html">Home 5</a></li>
                                    <li><a href="index-6.html">Home 6</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="jobs-grid.html">Find a Job</a>
                                <ul class="sub-menu">
                                    <li><a href="jobs-grid.html">Jobs Grid</a></li>
                                    <li><a href="jobs-list.html">Jobs List</a></li>
                                    <li><a href="job-details.html">Jobs Details  </a></li>
                                    <li><a href="job-details-2.html">Jobs Details 2              </a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="companies-grid.html">Recruiters</a>
                                <ul class="sub-menu">
                                    <li><a href="companies-grid.html">Recruiters</a></li>
                                    <li><a href="company-details.html">Company Details</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="candidates-grid.html">Candidates</a>
                                <ul class="sub-menu">
                                    <li><a href="candidates-grid.html">Candidates Grid</a></li>
                                    <li><a href="candidate-details.html">Candidate Details</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="blog-grid.html">Pages</a>
                                <ul class="sub-menu">
                                    <li><a href="page-about.html">About Us</a></li>
                                    <li><a href="page-pricing.html">Pricing Plan</a></li>
                                    <li><a href="page-contact.html">Contact Us</a></li>
                                    <li><a href="page-register.html">Register</a></li>
                                    <li><a href="page-signin.html">Signin</a></li>
                                    <li><a href="page-reset-password.html">Reset Password</a></li>
                                    <li><a href="page-content-protected.html">Content Protected</a></li>
                                </ul>
                            </li>
                            <li class="has-children"><a href="blog-grid.html">Blog</a>
                                <ul class="sub-menu">
                                    <li><a href="blog-grid.html">Blog Grid</a></li>
                                    <li><a href="blog-grid-2.html">Blog Grid 2</a></li>
                                    <li><a href="blog-details.html">Blog Single</a></li>
                                </ul>
                            </li>
                            <li><a href="http://wp.alithemes.com/html/jobbox/demos/dashboard" target="_blank">Dashboard</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="mobile-account">
                    <h6 class="mb-10">Your Account</h6>
                    <ul class="mobile-menu font-heading">
                        <li><a href="#">Profile</a></li>
                        <li><a href="#">Work Preferences</a></li>
                        <li><a href="#">Account Settings</a></li>
                        <li><a href="#">Go Pro</a></li>
                        <li><a href="page-signin.html">Sign Out</a></li>
                    </ul>
                </div>
                <div class="site-copyright">Copyright 2022 &copy; JobBox. <br>Designed by AliThemes.</div>
            </div>
        </div>
    </div>
</div>
<main class="main">

    <div class="bg-homepage4"></div>

    {{-- Start Get Job Section --}}
    <section class="section-box">
        <div class="banner-hero hero-1 banner-homepage4">
            <div class="banner-inner">
                <div class="row">
                    <div class="col-xl-7 col-lg-12">
                        <div class="block-banner">
                            <h1 class="heading-banner wow animate__animated animate__fadeInUp">احصل على <span class="color-brand-2">الوظيفة المناسبة</span><br class="d-none d-lg-block">التي تستحقها</h1>
                            <div class="banner-description mt-20 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">كل شهر، يتوجه أكثر من 3 ملايين باحث عن عمل إلى الموقع في بحثهم عن العمل،<br class="d-none d-lg-block">مما يؤدي إلى تقديم أكثر من 140,000 طلب كل يوم</div>
                            <div class="form-find mt-40 wow animate__animated animate__fadeIn" data-wow-delay=".2s">
                                <form>
                                    <div class="box-industry">
                                        <select class="form-input mr-10 select-active input-industry">
                                            <option value="0">الصناعة</option>
                                            <option value="1">البرمجيات</option>
                                            <option value="2">المالية</option>
                                            <option value="3">التوظيف</option>
                                            <option value="4">الإدارة</option>
                                            <option value="5">الإعلان</option>
                                            <option value="6">التطوير</option>
                                        </select>
                                    </div>
                                    <select class="form-input mr-10 select-active">
                                        <option value="">الموقع</option>
                                        <option value="AX">جزر آلاند</option>
                                        <option value="AF">أفغانستان</option>
                                        <option value="AL">ألبانيا</option>
                                        <option value="DZ">الجزائر</option>
                                        <option value="AD">أندورا</option>
                                        <option value="AO">أنغولا</option>
                                        <option value="AI">أنغيلا</option>
                                        <option value="AQ">أنتاركتيكا</option>
                                        <option value="AG">أنتيغوا وباربودا</option>
                                        <option value="AR">الأرجنتين</option>
                                        <option value="AM">أرمينيا</option>
                                        <option value="AW">أروبا</option>
                                        <option value="AU">أستراليا</option>
                                        <option value="AT">النمسا</option>
                                        <option value="AZ">أذربيجان</option>
                                        <option value="BS">الباهاما</option>
                                        <option value="BH">البحرين</option>
                                        <option value="BD">بنغلاديش</option>
                                        <option value="BB">بربادوس</option>
                                        <option value="BY">بيلاروسيا</option>
                                        <option value="PW">بلاو</option>
                                        <option value="BE">بلجيكا</option>
                                        <option value="BZ">بليز</option>
                                        <option value="BJ">بنين</option>
                                        <option value="BM">برمودا</option>
                                        <option value="BT">بوتان</option>
                                        <option value="BO">بوليفيا</option>
                                        <option value="BQ">بونير، سانت أوستاتيوس وسابا</option>
                                        <option value="BA">البوسنة والهرسك</option>
                                        <option value="BW">بوتسوانا</option>
                                        <option value="BV">جزيرة بوفيه</option>
                                        <option value="BR">البرازيل</option>
                                        <option value="IO">إقليم المحيط الهندي البريطاني</option>
                                        <option value="VG">جزر فيرجن البريطانية</option>
                                        <option value="BN">بروناي</option>
                                        <option value="BG">بلغاريا</option>
                                        <option value="BF">بوركينا فاسو</option>
                                        <option value="BI">بوروندي</option>
                                        <option value="KH">كمبوديا</option>
                                        <option value="CM">الكاميرون</option>
                                        <option value="CA">كندا</option>
                                        <option value="CV">الرأس الأخضر</option>
                                        <option value="KY">جزر كايمان</option>
                                        <option value="CF">جمهورية أفريقيا الوسطى</option>
                                        <option value="TD">تشاد</option>
                                        <option value="CL">تشيلي</option>
                                        <option value="CN">الصين</option>
                                        <option value="CX">جزيرة الكريسماس</option>
                                        <option value="CC">جزر كوكوس (كيلينغ)</option>
                                        <option value="CO">كولومبيا</option>
                                        <option value="KM">جزر القمر</option>
                                        <option value="CG">الكونغو (برازافيل)</option>
                                        <option value="CD">الكونغو (كينشاسا)</option>
                                        <option value="CK">جزر كوك</option>
                                        <option value="CR">كوستاريكا</option>
                                        <option value="HR">كرواتيا</option>
                                        <option value="CU">كوبا</option>
                                        <option value="CW">كوراساو</option>
                                        <option value="CY">قبرص</option>
                                        <option value="CZ">جمهورية التشيك</option>
                                        <option value="DK">الدنمارك</option>
                                        <option value="DJ">جيبوتي</option>
                                        <option value="DM">دومينيكا</option>
                                        <option value="DO">جمهورية الدومينيكان</option>
                                        <option value="EC">الإكوادور</option>
                                        <option value="EG">مصر</option>
                                        <option value="SV">السلفادور</option>
                                        <option value="GQ">غينيا الاستوائية</option>
                                        <option value="ER">إريتريا</option>
                                        <option value="EE">إستونيا</option>
                                        <option value="ET">إثيوبيا</option>
                                        <option value="FK">جزر فوكلاند</option>
                                        <option value="FO">جزر فارو</option>
                                        <option value="FJ">فيجي</option>
                                        <option value="FI">فنلندا</option>
                                        <option value="FR">فرنسا</option>
                                        <option value="GF">غويانا الفرنسية</option>
                                        <option value="PF">بولينيزيا الفرنسية</option>
                                        <option value="TF">الأقاليم الجنوبية الفرنسية</option>
                                        <option value="GA">الغابون</option>
                                        <option value="GM">غامبيا</option>
                                        <option value="GE">جورجيا</option>
                                        <option value="DE">ألمانيا</option>
                                        <option value="GH">غانا</option>
                                        <option value="GI">جبل طارق</option>
                                        <option value="GR">اليونان</option>
                                        <option value="GL">غرينلاند</option>
                                        <option value="GD">غرينادا</option>
                                        <option value="GP">غوادلوب</option>
                                        <option value="GT">غواتيمالا</option>
                                        <option value="GG">غيرنزي</option>
                                        <option value="GN">غينيا</option>
                                        <option value="GW">غينيا بيساو</option>
                                        <option value="GY">غيانا</option>
                                        <option value="HT">هايتي</option>
                                        <option value="HM">جزيرة هيرد وجزر ماكدونالد</option>
                                        <option value="HN">هندوراس</option>
                                        <option value="HK">هونغ كونغ</option>
                                        <option value="HU">هنغاريا</option>
                                        <option value="IS">أيسلندا</option>
                                        <option value="IN">الهند</option>
                                        <option value="ID">إندونيسيا</option>
                                        <option value="IR">إيران</option>
                                        <option value="IQ">العراق</option>
                                        <option value="IM">جزيرة مان</option>
                                        <option value="IL">إسرائيل</option>
                                        <option value="IT">إيطاليا</option>
                                        <option value="CI">ساحل العاج</option>
                                        <option value="JM">جامايكا</option>
                                        <option value="JP">اليابان</option>
                                        <option value="JE">جيرسي</option>
                                        <option value="JO">الأردن</option>
                                        <option value="KZ">كازاخستان</option>
                                        <option value="KE">كينيا</option>
                                        <option value="KI">كيريباتي</option>
                                        <option value="KW">الكويت</option>
                                        <option value="KG">قيرغيزستان</option>
                                        <option value="LA">لاوس</option>
                                        <option value="LV">لاتفيا</option>
                                        <option value="LB">لبنان</option>
                                        <option value="LS">ليسوتو</option>
                                        <option value="LR">ليبيريا</option>
                                        <option value="LY">ليبيا</option>
                                        <option value="LI">ليختنشتاين</option>
                                        <option value="LT">ليتوانيا</option>
                                        <option value="LU">لوكسمبورغ</option>
                                        <option value="MO">ماكاو س.أ.ر.، الصين</option>
                                        <option value="MK">مقدونيا</option>
                                        <option value="MG">مدغشقر</option>
                                        <option value="MW">مالاوي</option>
                                        <option value="MY">ماليزيا</option>
                                        <option value="MV">المالديف</option>
                                        <option value="ML">مالي</option>
                                        <option value="MT">مالطا</option>
                                        <option value="MH">جزر مارشال</option>
                                        <option value="MQ">مارتينيك</option>
                                        <option value="MR">موريتانيا</option>
                                        <option value="MU">موريشيوس</option>
                                        <option value="YT">مايوت</option>
                                        <option value="MX">المكسيك</option>
                                        <option value="FM">ميكرونيزيا</option>
                                        <option value="MD">مولدوفا</option>
                                        <option value="MC">موناكو</option>
                                        <option value="MN">منغوليا</option>
                                        <option value="ME">الجبل الأسود</option>
                                        <option value="MS">مونتسيرات</option>
                                        <option value="MA">المغرب</option>
                                        <option value="MZ">موزمبيق</option>
                                        <option value="MM">ميانمار</option>
                                        <option value="NA">ناميبيا</option>
                                        <option value="NR">ناورو</option>
                                        <option value="NP">نيبال</option>
                                        <option value="NL">هولندا</option>
                                        <option value="AN">جزر الأنتيل الهولندية</option>
                                        <option value="NC">كاليدونيا الجديدة</option>
                                        <option value="NZ">نيوزيلندا</option>
                                        <option value="NI">نيكاراغوا</option>
                                        <option value="NE">النيجر</option>
                                        <option value="NG">نيجيريا</option>
                                        <option value="NU">نيوي</option>
                                        <option value="NF">جزيرة نورفولك</option>
                                        <option value="KP">كوريا الشمالية</option>
                                        <option value="NO">النرويج</option>
                                        <option value="OM">عمان</option>
                                        <option value="PK">باكستان</option>
                                        <option value="PS">الأراضي الفلسطينية</option>
                                        <option value="PA">بنما</option>
                                        <option value="PG">بابوا غينيا الجديدة</option>
                                        <option value="PY">باراغواي</option>
                                        <option value="PE">بيرو</option>
                                        <option value="PH">الفلبين</option>
                                        <option value="PN">بيتكيرن</option>
                                        <option value="PL">بولندا</option>
                                        <option value="PT">البرتغال</option>
                                        <option value="QA">قطر</option>
                                        <option value="IE">جمهورية أيرلندا</option>
                                        <option value="RE">ريونيون</option>
                                        <option value="RO">رومانيا</option>
                                        <option value="RU">روسيا</option>
                                        <option value="RW">رواندا</option>
                                        <option value="ST">ساو تومي وبرينسيبي</option>
                                        <option value="BL">سانت بارتيليمي</option>
                                        <option value="SH">سانت هيلينا</option>
                                        <option value="KN">سانت كيتس ونيفيس</option>
                                        <option value="LC">سانت لوسيا</option>
                                        <option value="SX">سانت مارتن (الجزء الهولندي)</option>
                                        <option value="MF">سانت مارتن (الجزء الفرنسي)</option>
                                        <option value="PM">سانت بيير وميكلون</option>
                                        <option value="VC">سانت فنسنت وجزر غرينادين</option>
                                        <option value="SM">سان مارينو</option>
                                        <option value="SA">المملكة العربية السعودية</option>
                                        <option value="SN">السنغال</option>
                                        <option value="RS">صربيا</option>
                                        <option value="SC">سيشيل</option>
                                        <option value="SL">سيراليون</option>
                                        <option value="SG">سنغافورة</option>
                                        <option value="SK">سلوفاكيا</option>
                                        <option value="SI">سلوفينيا</option>
                                        <option value="SB">جزر سليمان</option>
                                        <option value="SO">الصومال</option>
                                        <option value="ZA">جنوب أفريقيا</option>
                                        <option value="GS">جورجيا الجنوبية/جزر ساندويتش</option>
                                        <option value="KR">كوريا الجنوبية</option>
                                        <option value="SS">جنوب السودان</option>
                                        <option value="ES">إسبانيا</option>
                                        <option value="LK">سريلانكا</option>
                                        <option value="SD">السودان</option>
                                        <option value="SR">سورينام</option>
                                        <option value="SJ">سفالبارد ويان ماين</option>
                                        <option value="SZ">سوازيلاند</option>
                                        <option value="SE">السويد</option>
                                        <option value="CH">سويسرا</option>
                                        <option value="SY">سوريا</option>
                                        <option value="TW">تايوان</option>
                                        <option value="TJ">طاجيكستان</option>
                                        <option value="TZ">تنزانيا</option>
                                        <option value="TH">تايلاند</option>
                                        <option value="TL">تيمور الشرقية</option>
                                        <option value="TG">توغو</option>
                                        <option value="TK">توكيلاو</option>
                                        <option value="TO">تونغا</option>
                                        <option value="TT">ترينيداد وتوباغو</option>
                                        <option value="TN">تونس</option>
                                        <option value="TR">تركيا</option>
                                        <option value="TM">تركمانستان</option>
                                        <option value="TC">جزر تركس وكايكوس</option>
                                        <option value="TV">توفالو</option>
                                        <option value="UG">أوغندا</option>
                                        <option value="UA">أوكرانيا</option>
                                        <option value="AE">الإمارات العربية المتحدة</option>
                                        <option value="GB">المملكة المتحدة (المملكة المتحدة)</option>
                                        <option value="US">الولايات المتحدة الأمريكية (الولايات المتحدة)</option>
                                        <option value="UY">أوروغواي</option>
                                        <option value="UZ">أوزبكستان</option>
                                        <option value="VU">فانواتو</option>
                                        <option value="VA">الفاتيكان</option>
                                        <option value="VE">فنزويلا</option>
                                        <option value="VN">فيتنام</option>
                                        <option value="WF">واليس وفوتونا</option>
                                        <option value="EH">الصحراء الغربية</option>
                                        <option value="WS">ساموا الغربية</option>
                                        <option value="YE">اليمن</option>
                                        <option value="ZM">زامبيا</option>
                                        <option value="ZW">زيمبابوي</option>
                                    </select>
                                    <input class="form-input input-keysearch mr-10" type="text" placeholder="كلمتك الرئيسية... ">
                                    <button class="btn btn-default btn-find font-sm">بحث</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-12 d-none d-xl-block col-md-6">
                        <div class="banner-imgs">
                            <div class="block-1 shape-1"><img class="img-responsive" alt="jobBox" src="assets/imgs/page/homepage4/banner.png"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Get Job Section --}}

    {{-- Start Latest jobs Section --}}
    <section class="section-box mt-110">
        <div class="section-box wow animate__animated animate__fadeIn mt-70">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">أحدث الوظائف المنشورة</h2>
                    <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">استكشف الأنواع المختلفة من الوظائف المتاحة للتقديم<br class="d-none d-lg-block">واكتشف أيها الأنسب لك.</p>
                    <div class="list-tabs list-tabs-2 mt-30">
                        <ul class="nav nav-tabs" role="tablist">
                            <li><a class="active" id="nav-tab-job-1" href="#tab-job-1" data-bs-toggle="tab" role="tab" aria-controls="tab-job-1" aria-selected="true"><img src="assets/imgs/page/homepage1/management.svg" alt="jobBox"> الإدارة</a></li>
                            <li><a id="nav-tab-job-2" href="#tab-job-2" data-bs-toggle="tab" role="tab" aria-controls="tab-job-2" aria-selected="false"><img src="assets/imgs/page/homepage1/marketing.svg" alt="jobBox"> التسويق والمبيعات</a></li>
                            <li><a id="nav-tab-job-3" href="#tab-job-3" data-bs-toggle="tab" role="tab" aria-controls="tab-job-3" aria-selected="false"><img src="assets/imgs/page/homepage1/finance.svg" alt="jobBox"> المالية</a></li>
                            <li><a id="nav-tab-job-4" href="#tab-job-4" data-bs-toggle="tab" role="tab" aria-controls="tab-job-4" aria-selected="false"><img src="assets/imgs/page/homepage1/human.svg" alt="jobBox"> الموارد البشرية</a></li>
                            <li><a id="nav-tab-job-5" href="#tab-job-5" data-bs-toggle="tab" role="tab" aria-controls="tab-job-5" aria-selected="false"><img src="assets/imgs/page/homepage1/retail.svg" alt="jobBox"> البيع بالتجزئة والمنتجات</a></li>
                            <li><a id="nav-tab-job-6" href="#tab-job-6" data-bs-toggle="tab" role="tab" aria-controls="tab-job-6" aria-selected="false"><img src="assets/imgs/page/homepage1/content.svg" alt="jobBox"> كاتب المحتوى</a></li>
                            <li><a id="nav-tab-job-7" href="#tab-job-7" data-bs-toggle="tab" role="tab" aria-controls="tab-job-7" aria-selected="false"><img src="assets/imgs/page/homepage1/content.svg" alt="jobBox"> تصميم الأثاث</a></li>
                            <li><a id="nav-tab-job-8" href="#tab-job-8" data-bs-toggle="tab" role="tab" aria-controls="tab-job-8" aria-selected="false"><img src="assets/imgs/page/homepage1/content.svg" alt="jobBox"> أخرى</a></li>
                        </ul>
                    </div>
                </div>
                <div class="mt-10">
                    <div class="tab-content" id="myTabContent-1">
                        <div class="tab-pane fade show active" id="tab-job-1" role="tabpanel" aria-labelledby="tab-job-1">
                            <div class="row">
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 grid-bd-16 hover-up">
                                        <div class="card-grid-2-image"><span class="lbl-hot bg-green"><span>مستقل</span></span>
                                            <div class="image-box">
                                                <figure><img src="assets/imgs/page/homepage2/img1.png" alt="jobBox"></figure>
                                            </div>
                                        </div>
                                        <div class="card-block-info" style="text-align: right">
                                            <h5><a href="job-details.html">مطور ويب React Native</a></h5>
                                            <div class="mt-5"><span class="card-location mr-15">نيويورك، الولايات المتحدة</span><span class="card-time">منذ 3 دقائق</span></div>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-xl-7 col-md-7 mb-2"><a class="btn btn-tags-sm mr-5" href="jobs-grid.html">Figma</a><a class="btn btn-tags-sm mr-5" href="jobs-grid.html">Adobe XD</a>
                                                    </div>
                                                    <div class="col-xl-5 col-md-5 text-lg-end"><span class="card-text-price">$90 - $120</span><span class="text-muted">/ساعة</span></div>
                                                </div>
                                            </div>
                                            <p class="font-sm color-text-paragraph mt-20">لوريم إيبسوم دولور سيت أميت، كونسيكتيتور أديبيسيسينغ إيليت. ريكسوساندي أركيتكتو إيفينيت، دولور كو ريبيليندوس باريتورات</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 grid-bd-16 hover-up">
                                        <div class="card-grid-2-image"><span class="lbl-hot"><span>دوام كامل</span></span>
                                            <div class="image-box">
                                                <figure><img src="assets/imgs/page/homepage2/img2.png" alt="jobBox"></figure>
                                            </div>
                                        </div>
                                        <div class="card-block-info" style="text-align: right">
                                            <h5><a href="job-details.html">مدير التسويق الرقمي</a></h5>
                                            <div class="mt-5"><span class="card-location mr-15">شيكاغو، الولايات المتحدة</span><span class="card-time">منذ 6 دقائق</span></div>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-xl-7 col-md-7 mb-2"><a class="btn btn-tags-sm mr-5" href="jobs-grid.html">SEO</a><a class="btn btn-tags-sm mr-5" href="jobs-grid.html">Word</a>
                                                    </div>
                                                    <div class="col-xl-5 col-md-5 text-lg-end"><span class="card-text-price">$80 - $150</span><span class="text-muted">/ساعة</span></div>
                                                </div>
                                            </div>
                                            <p class="font-sm color-text-paragraph mt-20">لوريم إيبسوم دولور سيت أميت، كونسيكتيتور أديبيسيسينغ إيليت. ريكسوساندي أركيتكتو إيفينيت، دولور كو ريبيليندوس باريتورات</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 grid-bd-16 hover-up">
                                        <div class="card-grid-2-image"><span class="lbl-hot"><span>دوام كامل</span></span>
                                            <div class="image-box">
                                                <figure><img src="assets/imgs/page/homepage2/img3.png" alt="jobBox"></figure>
                                            </div>
                                        </div>
                                        <div class="card-block-info" style="text-align: right">
                                            <h5><a href="job-details.html">مصمم/مطور ويب</a></h5>
                                            <div class="mt-5"><span class="card-location mr-15">شيكاغو، الولايات المتحدة</span><span class="card-time">منذ 9 دقائق</span></div>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-xl-7 col-md-7 mb-2"><a class="btn btn-tags-sm mr-5" href="jobs-grid.html">HTML</a><a class="btn btn-tags-sm mr-5" href="jobs-grid.html">CSS</a><a class="btn btn-tags-sm mr-5" href="jobs-grid.html">JS</a>
                                                    </div>
                                                    <div class="col-xl-5 col-md-5 text-lg-end"><span class="card-text-price">$120 - $150</span><span class="text-muted">/ساعة</span></div>
                                                </div>
                                            </div>
                                            <p class="font-sm color-text-paragraph mt-20">لوريم إيبسوم دولور سيت أميت، كونسيكتيتور أديبيسيسينغ إيليت. ريكسوساندي أركيتكتو إيفينيت، دولور كو ريبيليندوس باريتورات</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 grid-bd-16 hover-up">
                                        <div class="card-grid-2-image"><span class="lbl-hot"><span>دوام كامل</span></span>
                                            <div class="image-box">
                                                <figure><img src="assets/imgs/page/homepage2/img4.png" alt="jobBox"></figure>
                                            </div>
                                        </div>
                                        <div class="card-block-info" style="text-align: right">
                                            <h5><a href="job-details.html">مهندس برمجيات متكامل</a></h5>
                                            <div class="mt-5"><span class="card-location mr-15">شيكاغو، الولايات المتحدة</span><span class="card-time">منذ 13 دقيقة</span></div>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-xl-7 col-md-7 mb-2"><a class="btn btn-tags-sm mr-5" href="jobs-grid.html">NodeJS</a><a class="btn btn-tags-sm mr-5" href="jobs-grid.html">MongoDB</a>
                                                    </div>
                                                    <div class="col-xl-5 col-md-5 text-lg-end"><span class="card-text-price">$80 - $150</span><span class="text-muted">/ساعة</span></div>
                                                </div>
                                            </div>
                                            <p class="font-sm color-text-paragraph mt-20">لوريم إيبسوم دولور سيت أميت، كونسيكتيتور أديبيسيسينغ إيليت. ريكسوساندي أركيتكتو إيفينيت، دولور كو ريبيليندوس باريتورات</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 grid-bd-16 hover-up">
                                        <div class="card-grid-2-image"><span class="lbl-hot"><span>دوام كامل</span></span>
                                            <div class="image-box">
                                                <figure><img src="assets/imgs/page/homepage2/img5.png" alt="jobBox"></figure>
                                            </div>
                                        </div>
                                        <div class="card-block-info" style="text-align: right">
                                            <h5><a href="job-details.html">مطور الواجهة الأمامية دوام كامل</a></h5>
                                            <div class="mt-5"><span class="card-location mr-15">شيكاغو، الولايات المتحدة</span><span class="card-time">منذ 16 دقيقة</span></div>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-xl-7 col-md-7 mb-2"><a class="btn btn-tags-sm mr-5" href="jobs-grid.html">Bootstrap</a>
                                                    </div>
                                                    <div class="col-xl-5 col-md-5 text-lg-end"><span class="card-text-price">$80 - $150</span><span class="text-muted">/ساعة</span></div>
                                                </div>
                                            </div>
                                            <p class="font-sm color-text-paragraph mt-20">لوريم إيبسوم دولور سيت أميت، كونسيكتيتور أديبيسيسينغ إيليت. ريكسوساندي أركيتكتو إيفينيت، دولور كو ريبيليندوس باريتورات</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                    <div class="card-grid-2 grid-bd-16 hover-up">
                                        <div class="card-grid-2-image"><span class="lbl-hot"><span>دوام كامل</span></span>
                                            <div class="image-box">
                                                <figure><img src="assets/imgs/page/homepage2/img6.png" alt="jobBox"></figure>
                                            </div>
                                        </div>
                                        <div class="card-block-info" style="text-align: right">
                                            <h5><a href="job-details.html">مطور تطبيقات React Native</a></h5>
                                            <div class="mt-5"><span class="card-location mr-15">شيكاغو، الولايات المتحدة</span><span class="card-time">منذ 30 دقيقة</span></div>
                                            <div class="card-2-bottom mt-20">
                                                <div class="row">
                                                    <div class="col-xl-7 col-md-7 mb-2"><a class="btn btn-tags-sm mr-5" href="jobs-grid.html">React</a><a class="btn btn-tags-sm mr-5" href="jobs-grid.html">NextJS</a>
                                                    </div>
                                                    <div class="col-xl-5 col-md-5 text-lg-end"><span class="card-text-price">$80 - $150</span><span class="text-muted">/ساعة</span></div>
                                                </div>
                                            </div>
                                            <p class="font-sm color-text-paragraph mt-20">لوريم إيبسوم دولور سيت أميت، كونسيكتيتور أديبيسيسينغ إيليت. ريكسوساندي أركيتكتو إيفينيت، دولور كو ريبيليندوس باريتورات</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center mt-10"><a class="btn btn-brand-1 btn-icon-more hover-up">شاهد المزيد</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Latest jobs Section --}}

    {{-- Start Browse By Category Section --}}
    <section class="section-box mt-110 bg-cat">
        <div class="section-box wow animate__animated animate__fadeIn mt-70">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-title mb-10 wow animate__animated animate__fadeInUp">تصفح حسب الفئة</h2>
                    <p class="font-lg color-text-paragraph-2 wow animate__animated animate__fadeInUp">ابحث عن الوظيفة المثالية لك. حوالي 800+ وظيفة جديدة كل يوم</p>
                </div>
                <div class="box-swiper mt-50">
                    <div class="swiper-container swiper-group-5 swiper">
                        <div class="swiper-wrapper pb-70 pt-5">
                            <div class="swiper-slide hover-up">
                                <a href="jobs-list.html">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="jobBox" src="assets/imgs/page/homepage1/marketing.svg"></div>
                                        <div class="text-info-right">
                                            <h4>التسويق والمبيعات</h4>
                                            <p class="font-xs">1526<span> وظيفة متاحة</span></p>
                                        </div>
                                    </div>
                                </a>
                                <a href="jobs-grid.html">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="jobBox" src="assets/imgs/page/homepage1/customer.svg"></div>
                                        <div class="text-info-right">
                                            <h4>مساعدة العملاء</h4>
                                            <p class="font-xs">185<span> وظيفة متاحة</span></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide hover-up">
                                <a href="jobs-grid.html">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="jobBox" src="assets/imgs/page/homepage1/finance.svg"></div>
                                        <div class="text-info-right">
                                            <h4>المالية</h4>
                                            <p class="font-xs">168<span> وظيفة متاحة</span></p>
                                        </div>
                                    </div>
                                </a>
                                <a href="jobs-list.html">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="jobBox" src="assets/imgs/page/homepage1/lightning.svg"></div>
                                        <div class="text-info-right">
                                            <h4>البرمجيات</h4>
                                            <p class="font-xs">1856<span> وظيفة متاحة</span></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide hover-up">
                                <a href="jobs-grid.html">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="jobBox" src="assets/imgs/page/homepage1/human.svg"></div>
                                        <div class="text-info-right">
                                            <h4>الموارد البشرية</h4>
                                            <p class="font-xs">165<span> وظيفة متاحة</span></p>
                                        </div>
                                    </div>
                                </a>
                                <a href="jobs-grid.html">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="jobBox" src="assets/imgs/page/homepage1/management.svg"></div>
                                        <div class="text-info-right">
                                            <h4>الإدارة</h4>
                                            <p class="font-xs">965<span> وظيفة متاحة</span></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide hover-up">
                                <a href="jobs-list.html">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="jobBox" src="assets/imgs/page/homepage1/retail.svg"></div>
                                        <div class="text-info-right">
                                            <h4>التجزئة والمنتجات</h4>
                                            <p class="font-xs">563<span> وظيفة متاحة</span></p>
                                        </div>
                                    </div>
                                </a>
                                <a href="jobs-grid.html">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="jobBox" src="assets/imgs/page/homepage1/security.svg"></div>
                                        <div class="text-info-right">
                                            <h4>محلل الأمن</h4>
                                            <p class="font-xs">254<span> وظيفة متاحة</span></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="swiper-slide hover-up">
                                <a href="jobs-grid.html">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="jobBox" src="assets/imgs/page/homepage1/content.svg"></div>
                                        <div class="text-info-right">
                                            <h4>كاتب المحتوى</h4>
                                            <p class="font-xs">142<span> وظيفة متاحة</span></p>
                                        </div>
                                    </div>
                                </a>
                                <a href="jobs-list.html">
                                    <div class="item-logo">
                                        <div class="image-left"><img alt="jobBox" src="assets/imgs/page/homepage1/research.svg"></div>
                                        <div class="text-info-right">
                                            <h4>أبحاث السوق</h4>
                                            <p class="font-xs">532<span> وظيفة متاحة</span></p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </div>
    </section>
    {{-- End Browse By Category Section --}}
</main>
<footer class="footer mt-50">
    <div class="container">
        <div class="row">
            <div class="footer-col-1 col-md-3 col-sm-12"><a href="index.html"><img alt="jobBox" src="assets/imgs/template/jobhub-logo.svg"></a>
                <div class="mt-20 mb-20 font-xs color-text-paragraph-2">JobBox هو قلب مجتمع التصميم وأفضل مورد لاكتشاف المصممين والوظائف والتواصل معهم في جميع أنحاء العالم.</div>
                <div class="footer-social"><a class="icon-socials icon-facebook" href="#"></a><a class="icon-socials icon-twitter" href="#"></a><a class="icon-socials icon-linkedin" href="#"></a></div>
            </div>
            <div class="footer-col-2 col-md-2 col-xs-6">
                <h6 class="mb-20">الموارد</h6>
                <ul class="menu-footer">
                    <li><a href="#">معلومات عنا</a></li>
                    <li><a href="#">فريقنا</a></li>
                    <li><a href="#">المنتجات</a></li>
                    <li><a href="#">اتصل بنا</a></li>
                </ul>
            </div>
            <div class="footer-col-3 col-md-2 col-xs-6">
                <h6 class="mb-20">المجتمع</h6>
                <ul class="menu-footer">
                    <li><a href="#">الميزة</a></li>
                    <li><a href="#">التسعير</a></li>
                    <li><a href="#">الائتمان</a></li>
                    <li><a href="#">الأسئلة الشائعة</a></li>
                </ul>
            </div>
            <div class="footer-col-4 col-md-2 col-xs-6">
                <h6 class="mb-20">روابط سريعة</h6>
                <ul class="menu-footer">
                    <li><a href="#">iOS</a></li>
                    <li><a href="#">Android</a></li>
                    <li><a href="#">Microsoft</a></li>
                    <li><a href="#">سطح المكتب</a></li>
                </ul>
            </div>
            <div class="footer-col-5 col-md-2 col-xs-6">
                <h6 class="mb-20">المزيد</h6>
                <ul class="menu-footer">
                    <li><a href="#">الخصوصية</a></li>
                    <li><a href="#">المساعدة</a></li>
                    <li><a href="#">الشروط</a></li>
                    <li><a href="#">الأسئلة الشائعة</a></li>
                </ul>
            </div>
            <div class="footer-col-6 col-md-3 col-sm-12">
                <h6 class="mb-20">تحميل التطبيق</h6>
                <p class="color-text-paragraph-2 font-xs">قم بتنزيل تطبيقاتنا واحصل على خصم إضافي بنسبة 15% على طلبك الأول&mldr;!</p>
                <div class="mt-15"><a class="mr-5" href="#"><img src="assets/imgs/template/icons/app-store.png" alt="joxBox"></a><a href="#"><img src="assets/imgs/template/icons/android.png" alt="joxBox"></a></div>
            </div>
        </div>
        <div class="footer-bottom mt-50">
            <div class="row">
                <div class="col-md-6"><span class="font-xs color-text-paragraph">حقوق الطبع والنشر &copy; 2022. JobBox جميع الحقوق محفوظة</span></div>
                <div class="col-md-6 text-md-end text-start">
                    <div class="footer-social"><a class="font-xs color-text-paragraph" href="#">سياسة الخصوصية</a><a class="font-xs color-text-paragraph mr-30 ml-30" href="#">الشروط والأحكام</a><a class="font-xs color-text-paragraph" href="#">الأمان</a></div>
                </div>
            </div>
        </div>
    </div>
</footer><script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<script src="assets/js/vendor/jquery-migrate-3.3.0.min.js"></script>
<script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
<script src="assets/js/plugins/waypoints.js"></script>
<script src="assets/js/plugins/wow.js"></script>
<script src="assets/js/plugins/magnific-popup.js"></script>
<script src="assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="assets/js/plugins/select2.min.js"></script>
<script src="assets/js/plugins/isotope.js"></script>
<script src="assets/js/plugins/scrollup.js"></script>
<script src="assets/js/plugins/swiper-bundle.min.js"></script>
<script src="assets/js/main.js?v=4.1"></script>
</body>
</html>
