<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Letsbab - Shop | Share | Earn | Give</title>
    <link rel="icon" href="{{asset('letsbab/shop/images/favicons/favicon.png')}}" sizes="32x32"/>
    <link rel="icon" href="{{asset('letsbab/shop/images/favicons/favicon.png')}}" sizes="192x192"/>
    <link rel="apple-touch-icon-precomposed" href="{{asset('letsbab/shop/images/favicons/favicon.png')}}"/>
    <meta name="msapplication-TileImage" content="{{asset('letsbab/shop/images/favicons/favicon.png')}}"/>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('letsbab/shop/css/bootstrap-material-design.min.css')}}">
    <link rel="stylesheet" href="{{asset('letsbab/shop/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('letsbab/shop/css/animate.cs')}}s">
    <link rel="stylesheet" type="text/css" href="{{asset('letsbab/shop/css/slick.css')}}"/>
    <link rel="stylesheet" type="text/css" href="{{asset('letsbab/shop/css/slick-theme.css')}}"/>
    <link rel="stylesheet" href="{{asset('letsbab/shop/css/slider.css')}}">
    <link rel="stylesheet" href="{{asset('letsbab/shop/css/style.css')}}">

</head>
<body>

@auth()
    @include('shop.template.include.left-menu')
@endif

@include('shop.template.include.header-logo')

<div class="main-container">
    <div class="page-header d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h1>Lets Donate</h1>
                </div>
                <div class="col-auto d-flex justify-content-end align-items-center page-header-right">
                    <ul>
                        <li><a href="{{route('shop.index')}}"><i class="fa fa-angle-left"></i> Back</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-------Main Wrapper-------->
    <div id="main-wrapper" class="main-wrapper">
        <div class="container">
            <div class="letsShare">

                <div class="row filterSlider">
                    <div class="container">
                        <h2>Share what you’ve made</h2>

                        <!-------Filter Slider-------->
                        <div class="css-yit-donation-filter"><b class="css-yit-donation-value">0%</b>
                            <input id="share_percentage" name="share_percentage" data-slider-id='ex1Slider' type="text" data-slider-min="0"
                                   data-slider-max="100" data-slider-step="10" data-slider-value="50"/>
                            <b class="css-yit-donation-value right">100%</b></div>
                        <!-------/Filter Slider-------->
                    </div>
                </div>


                <h2>Lets find a charity</h2>
                <div class="row findCharitywrap">

                    <!-------Find Charity Box-------->
                    <div class="col-sm-6 col-md-4 findCharity">
                        <div class="info-box css-yit-donation-box"><span class="info-box-icon bg-aqua"> <img
                                        src="{{asset('letsbab/shop/images/lets-share/ohvncwLnOIcAe5EqyvBtKRdKoiYU9752FzbWbSnE.png')}}" width="100"> </span>
                            <div class="info-box-content">
                                <div class="info-box-detail"><span class="info-box-text">Cancer Research UK</span> <span class="info-box-des"></span> <span
                                            class="info-box-excerpt">Cancer Research UK works ...</span>
                                    <div class="css-yit-info-detial"> Cancer Research UK works to bring forward the day when all cancers are cured.</div>
                                    <span class="css-yit-donation-check">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="radio" name="inlineRadioOptions" id="charity1" value="option1">
                    <label class="form-check-label custom-control-label" for="charity1"></label>
                  </div>
                  </span></div>
                                <span class="css-yi-info-btn"> <a href="javascript:;" class="" data-isonotification_id="" data-index="0">Read More <i
                                                class="fa fa-caret-down"> </i></a> </span></div>
                        </div>
                    </div>
                    <!-------/Find Charity Box-------->

                    <!-------Find Charity Box-------->
                    <div class="col-sm-6 col-md-4 findCharity">
                        <div class="info-box css-yit-donation-box"><span class="info-box-icon bg-aqua"> <img
                                        src="{{asset('letsbab/shop/images/lets-share/uNhyat1Sflw4n25OsnDV13cIzuK3VGymnuA5aELJ.png')}}" width="100"> </span>
                            <div class="info-box-content">
                                <div class="info-box-detail"><span class="info-box-text">Books for Africa</span> <span class="info-box-des"></span> <span
                                            class="info-box-excerpt">https://www.booksforafric...</span>
                                    <div class="css-yit-info-detial"> https://www.booksforafrica.org/ collects, sorts, and ships books to African schools,
                                        libraries and universities. We have shipped 42 million books, serving every country in Africa, since 1988. Our mission
                                        is to end the African book famine.
                                    </div>
                                    <span class="css-yit-donation-check">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="radio" name="inlineRadioOptions" id="charity2" value="option1">
                    <label class="form-check-label custom-control-label" for="charity2"></label>
                  </div>
                  </span></div>
                                <span class="css-yi-info-btn"> <a href="javascript:;" class="" data-isonotification_id="" data-index="2">Read More <i
                                                class="fa fa-caret-down"> </i></a> </span></div>
                        </div>
                    </div>
                    <!-------/Find Charity Box-------->

                    <!-------Find Charity Box-------->
                    <div class="col-sm-6 col-md-4 findCharity">
                        <div class="info-box css-yit-donation-box"><span class="info-box-icon bg-aqua"> <img
                                        src="{{asset('letsbab/shop/images/lets-share/xnRi8JROLxw39OpfpfVNpAJiTyWt5sShwnZXAZeD.png')}}" width="100"> </span>
                            <div class="info-box-content">
                                <div class="info-box-detail"><span class="info-box-text">charity: water</span> <span class="info-box-des"></span> <span
                                            class="info-box-excerpt">To provide clean water to...</span>
                                    <div class="css-yit-info-detial"> To provide clean water to developing countries.</div>
                                    <span class="css-yit-donation-check">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="radio" name="inlineRadioOptions" id="charity3" value="option1">
                    <label class="form-check-label custom-control-label" for="charity3"></label>
                  </div>
                  </span></div>
                                <span class="css-yi-info-btn"> <a href="javascript:;" class="" data-isonotification_id="" data-index="3">Read More <i
                                                class="fa fa-caret-down"> </i></a> </span></div>
                        </div>
                    </div>
                    <!-------/Find Charity Box-------->

                    <!-------Find Charity Box-------->
                    <div class="col-sm-6 col-md-4 findCharity">
                        <div class="info-box css-yit-donation-box"><span class="info-box-icon bg-aqua"> <img
                                        src="{{asset('letsbab/shop/images/lets-share/RNn6S3DOrEKLNJSOSr2FlFXCH9N5jMKR1yrOOXab.png')}}" width="100"> </span>
                            <div class="info-box-content">
                                <div class="info-box-detail"><span class="info-box-text">CoppaFeel!</span> <span class="info-box-des"></span> <span
                                            class="info-box-excerpt">https://www.coppafeel.org...</span>
                                    <div class="css-yit-info-detial"> https://www.coppafeel.org are the first UK breast cancer charity to create awareness
                                        amongst young people, with the aim to install a new healthy habit that could one day save a life. They are on a mission
                                        to stamp out late detection of breast cancer and ensure the nation is checking their boobs regularly. They want to
                                        educate people on the signs and symptoms of breast cancer, encourage them to get to know what is normal for them and
                                        empower young people to have the confidence to see a doctor if they notice anything that isn't right for them.
                                        Registered charity no. 1132366.
                                    </div>
                                    <span class="css-yit-donation-check">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="radio" name="inlineRadioOptions" id="charity4" value="option1">
                    <label class="form-check-label custom-control-label" for="charity4"></label>
                  </div>
                  </span></div>
                                <span class="css-yi-info-btn"> <a href="javascript:;" class="" data-isonotification_id="" data-index="4">Read More <i
                                                class="fa fa-caret-down"> </i></a> </span></div>
                        </div>
                    </div>
                    <!-------/Find Charity Box-------->

                    <!-------Find Charity Box-------->
                    <div class="col-sm-6 col-md-4 findCharity">
                        <div class="info-box css-yit-donation-box"><span class="info-box-icon bg-aqua"> <img
                                        src="{{asset('letsbab/shop/images/lets-share/j2sCXg1CtWW92ldz8nkTH7sYtmVjywd5Gbg4LzQ3.png')}}" width="100"> </span>
                            <div class="info-box-content">
                                <div class="info-box-detail"><span class="info-box-text">Lonely Whale</span> <span class="info-box-des"></span> <span
                                            class="info-box-excerpt">Lonely Whale is an award-...</span>
                                    <div class="css-yit-info-detial"> Lonely Whale is an award-winning incubator for courageous ideas that drive impactful
                                        market-based change on behalf of our ocean. Lonely Whale is working towards a new era of radical collaboration, together
                                        facilitating the creation of innovative ideas that push the boundary on current trends in technology, media and advocacy
                                        that positively impact the health of our ocean.
                                    </div>
                                    <span class="css-yit-donation-check">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="radio" name="inlineRadioOptions" id="charity5" value="option1">
                    <label class="form-check-label custom-control-label" for="charity5"></label>
                  </div>
                  </span></div>
                                <span class="css-yi-info-btn"> <a href="javascript:;" class="" data-isonotification_id="" data-index="5">Read More <i
                                                class="fa fa-caret-down"> </i></a> </span></div>
                        </div>
                    </div>
                    <!-------/Find Charity Box-------->

                    <!-------Find Charity Box-------->
                    <div class="col-sm-6 col-md-4 findCharity">
                        <div class="info-box css-yit-donation-box"><span class="info-box-icon bg-aqua"> <img
                                        src="{{asset('letsbab/shop/images/lets-share/v9lKA8cCdFOx6HtJbov3bAYJcm0mFmmBCPDwhDmx.png')}}" width="100"> </span>
                            <div class="info-box-content">
                                <div class="info-box-detail"><span class="info-box-text">End Youth Homelessness</span> <span class="info-box-des">End Youth Homelessness Alliance</span>
                                    <span class="info-box-excerpt">More than 103,000 young p...</span>
                                    <div class="css-yit-info-detial"> More than 103,000 young people are homeless in the UK every year.
                                        https://www.eyh.org.uk/en/ (EYH) is a UK-wide movement of local charities working with over 30,000 young people. EYH
                                        helps charities collaborate to increase awareness, share experience and generate voluntary income to deliver services
                                        which transform the lives of homeless young people.\n\nWe believe that all homeless young people have the potential to
                                        turn their lives around. They can go to university, get a good job or even start their own business. They can all have a
                                        happy and independent life, if they get the right help at the right time. Registered charity no. 292411.
                                    </div>
                                    <span class="css-yit-donation-check">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="radio" name="inlineRadioOptions" id="charity6" value="option1">
                    <label class="form-check-label custom-control-label" for="charity6"></label>
                  </div>
                  </span></div>
                                <span class="css-yi-info-btn"> <a href="javascript:;" class="" data-isonotification_id="" data-index="6">Read More <i
                                                class="fa fa-caret-down"> </i></a> </span></div>
                        </div>
                    </div>
                    <!-------/Find Charity Box-------->


                    <!-------Find Charity Box-------->
                    <div class="col-sm-6 col-md-4 findCharity">
                        <div class="info-box css-yit-donation-box"><span class="info-box-icon bg-aqua"> <img
                                        src="{{asset('letsbab/shop/images/lets-share/uBZ7IHClSBa4cSB5xaZSoa7CnPzF0t4xt7JTJmFq.png')}}" width="100"> </span>
                            <div class="info-box-content">
                                <div class="info-box-detail"><span class="info-box-text">Legacy of War Foundation</span>
                                    <span class="info-box-des">Legacy of War Foundation</span>
                                    <span class="info-box-excerpt">Supporting people rebuild...</span>
                                    <div class="css-yit-info-detial"> Supporting people rebuilding their lives following war. Working for a peaceful planet.
                                        Registered charity no. 1174792.
                                    </div>
                                    <span class="css-yit-donation-check">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="radio" name="inlineRadioOptions" id="charity7" value="option1">
                    <label class="form-check-label custom-control-label" for="charity7"></label>
                  </div>
                  </span></div>
                                <span class="css-yi-info-btn"> <a href="javascript:;" class="" data-isonotification_id="" data-index="7">Read More <i
                                                class="fa fa-caret-down"> </i></a> </span></div>
                        </div>
                    </div>
                    <!-------/Find Charity Box-------->


                    <!-------Find Charity Box-------->
                    <div class="col-sm-6 col-md-4 findCharity">
                        <div class="info-box css-yit-donation-box"><span class="info-box-icon bg-aqua"> <img
                                        src="{{asset('letsbab/shop/images/lets-share/56TLKMLpopeXMt4hCmDv6TAyPhQRGljkWDTxuTNm.png')}}" width="100"> </span>
                            <div class="info-box-content">
                                <div class="info-box-detail"><span class="info-box-text">MicroLoan Foundation</span>
                                    <span class="info-box-des">MicroLoan Foundation</span>
                                    <span class="info-box-excerpt">https://www.microloanfoun...</span>
                                    <div class="css-yit-info-detial"> https://www.microloanfoundation.org.uk/ supports the poorest women in remote, rural areas
                                        of sub-Saharan Africa to work their own way out of poverty. We help these women to start small businesses by providing
                                        them with financial literacy and business training, small loans, and on-going support.\n\nWith a regular income they are
                                        able to provide the basics for their families – food, shelter, education and medicine. We teach them to save as
                                        insurance against crop failure, illness and other unexpected emergencies. In short, we give hope, not handouts.
                                        Registered charity no. 1104287.
                                    </div>
                                    <span class="css-yit-donation-check">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="radio" name="inlineRadioOptions" id="charity8" value="option1">
                    <label class="form-check-label custom-control-label" for="charity8"></label>
                  </div>
                  </span></div>
                                <span class="css-yi-info-btn"> <a href="javascript:;" class="" data-isonotification_id="" data-index="8">Read More <i
                                                class="fa fa-caret-down"> </i></a> </span></div>
                        </div>
                    </div>
                    <!-------/Find Charity Box-------->


                    <!-------Find Charity Box-------->
                    <div class="col-sm-6 col-md-4 findCharity">
                        <div class="info-box css-yit-donation-box"><span class="info-box-icon bg-aqua"> <img
                                        src="{{asset('letsbab/shop/images/lets-share/OTgGNz1yK91KCusp6wcVneD5DwXcr0ZvOAJ9OKQo.png')}}" width="100"> </span>
                            <div class="info-box-content">
                                <div class="info-box-detail"><span class="info-box-text">Movember Foundation</span>
                                    <span class="info-box-des">Movember Europe Trading Limited</span>
                                    <span class="info-box-excerpt">We’re the leading chari...</span>
                                    <div class="css-yit-info-detial"> We’re the leading charity changing the face of men’s health. We’re addressing some of the
                                        biggest health issues faced by men: prostate cancer, testicular cancer, and mental health and suicide prevention.\n\nWe
                                        know what works for men, and how to find and fund the most innovative research to have both a global and local
                                        impact.\n\nWe're independent of government funding, so we can challenge the status quo and invest quicker in what works.
                                        In 15 years we’ve funded more than 1,200 men’s health projects around the world.\n\nBy 2030 we’ll reduce the number of
                                        men dying prematurely by 25%. Registered charity no. 1137948.
                                    </div>
                                    <span class="css-yit-donation-check">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="radio" name="inlineRadioOptions" id="charity9" value="option1">
                    <label class="form-check-label custom-control-label" for="charity9"></label>
                  </div>
                  </span></div>
                                <span class="css-yi-info-btn"> <a href="javascript:;" class="" data-isonotification_id="" data-index="9">Read More <i
                                                class="fa fa-caret-down"> </i></a> </span></div>
                        </div>
                    </div>
                    <!-------/Find Charity Box-------->


                    <!-------Find Charity Box-------->
                    <div class="col-sm-6 col-md-4 findCharity">
                        <div class="info-box css-yit-donation-box"><span class="info-box-icon bg-aqua"> <img
                                        src="{{asset('letsbab/shop/images/lets-share/HO5buJqOFYCjLPzPMVGOvcHTaU73KBTbe1b6tdOy.png')}}" width="100"> </span>
                            <div class="info-box-content">
                                <div class="info-box-detail">
                                    <span class="info-box-text">Smile Train</span>
                                    <span class="info-box-des">Smile Train</span>
                                    <span class="info-box-excerpt">https://www.smiletrain.or...</span>
                                    <div class="css-yit-info-detial"> https://www.smiletrain.org/ empowers local medical professionals with training, funding,
                                        and resources to provide free cleft surgery and comprehensive cleft care to children globally. We advance a sustainable
                                        solution and scalable global health model for cleft treatment, drastically improving children’s lives, including their
                                        ability to eat, breathe, speak, and ultimately thrive. Registered charity no. 1114748.
                                    </div>
                                    <span class="css-yit-donation-check">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="radio" name="inlineRadioOptions" id="charity10" value="option1">
                    <label class="form-check-label custom-control-label" for="charity10"></label>
                  </div>
                  </span></div>
                                <span class="css-yi-info-btn"> <a href="javascript:;" class="" data-isonotification_id="" data-index="10">Read More <i
                                                class="fa fa-caret-down"> </i></a> </span></div>
                        </div>
                    </div>
                    <!-------/Find Charity Box-------->

                    <!-------Find Charity Box-------->
                    <div class="col-sm-6 col-md-4 findCharity">
                        <div class="info-box css-yit-donation-box"><span class="info-box-icon bg-aqua"> <img
                                        src="{{asset('letsbab/shop/images/lets-share/Jl52zK9if6BATxHYyCaZ02ENnx5iGZwEPlucCz8d.png')}}" width="100"> </span>
                            <div class="info-box-content">
                                <div class="info-box-detail">
                                    <span class="info-box-text">The Trevor Project</span>
                                    <span class="info-box-des">The Trevor Project, Inc.</span>
                                    <span class="info-box-excerpt">https://www.thetrevorproj...</span>
                                    <div class="css-yit-info-detial"> https://www.thetrevorproject.org/ mission is to end suicide among lesbian, gay, bisexual,
                                        transgender, queer, and questioning young people.
                                    </div>
                                    <span class="css-yit-donation-check">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="radio" name="inlineRadioOptions" id="charity11" value="option1">
                    <label class="form-check-label custom-control-label" for="charity10"></label>
                  </div>
                  </span></div>
                                <span class="css-yi-info-btn"> <a href="javascript:;" class="" data-isonotification_id="" data-index="11">Read More <i
                                                class="fa fa-caret-down"> </i></a> </span></div>
                        </div>
                    </div>
                    <!-------/Find Charity Box-------->


                    <!-------Find Charity Box-------->
                    <div class="col-sm-6 col-md-4 findCharity">
                        <div class="info-box css-yit-donation-box"><span class="info-box-icon bg-aqua"> <img
                                        src="{{asset('letsbab/shop/images/lets-share/l0pJz595544tZX1lJpSU5tmVkQScjyiNg1Co3FLj.png')}}" width="100"> </span>
                            <div class="info-box-content">
                                <div class="info-box-detail">
                                    <span class="info-box-text">Water is Life</span>
                                    <span class="info-box-des">WATERisLIFE.com, Inc.</span>
                                    <span class="info-box-excerpt">Providing water, sanitati...</span>
                                    <div class="css-yit-info-detial"> Providing water, sanitation and hygiene training in over 40 countries around the world.
                                        Saving lives, transforming communities.
                                    </div>
                                    <span class="css-yit-donation-check">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="radio" name="inlineRadioOptions" id="charity11" value="option1">
                    <label class="form-check-label custom-control-label" for="charity11"></label>
                  </div>
                  </span></div>
                                <span class="css-yi-info-btn"> <a href="javascript:;" class="" data-isonotification_id="" data-index="11">Read More <i
                                                class="fa fa-caret-down"> </i></a> </span></div>
                        </div>
                    </div>
                    <!-------/Find Charity Box-------->


                    <!-------Find Charity Box-------->
                    <div class="col-sm-6 col-md-4 findCharity">
                        <div class="info-box css-yit-donation-box"><span class="info-box-icon bg-aqua"> <img
                                        src="{{asset('letsbab/shop/images/lets-share/H55qEMrivIXfFL0NidGN64z8zJzYlZfxLb9GKcPg.png')}}" width="100"> </span>
                            <div class="info-box-content">
                                <div class="info-box-detail">
                                    <span class="info-box-text">Women for Women International</span>
                                    <span class="info-box-des">Women for Women International</span>
                                    <span class="info-box-excerpt">In countries affected by ...</span>
                                    <div class="css-yit-info-detial"> In countries affected by conflict and war, https://www.womenforwomen.org.uk/ supports the
                                        most marginalised women to earn and save money, improve health and well-being, influence decisions in their home and
                                        community, and connect to networks for support. By utilising skills, knowledge, and resources, she is able to create
                                        sustainable change for herself, her family, and community. Registered charity no. 1115109.
                                    </div>
                                    <span class="css-yit-donation-check">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="radio" name="inlineRadioOptions" id="charity12" value="option1">
                    <label class="form-check-label custom-control-label" for="charity12"></label>
                  </div>
                  </span></div>
                                <span class="css-yi-info-btn"> <a href="javascript:;" class="" data-isonotification_id="" data-index="12">Read More <i
                                                class="fa fa-caret-down"> </i></a> </span></div>
                        </div>
                    </div>
                    <!-------/Find Charity Box-------->


                    <!-------Find Charity Box-------->
                    <div class="col-sm-6 col-md-4 findCharity">
                        <div class="info-box css-yit-donation-box"><span class="info-box-icon bg-aqua"> <img
                                        src="{{asset('letsbab/shop/images/lets-share/9gCVmyjxVs26QZOwW3Agaw6FAxQqAyvtlmtSgMsm.png')}}" width="100"> </span>
                            <div class="info-box-content">
                                <div class="info-box-detail">
                                    <span class="info-box-text">Room to Read</span>
                                    <span class="info-box-des">Room to Read UK Limited</span>
                                    <span class="info-box-excerpt">https://www.roomtoread.or...</span>
                                    <div class="css-yit-info-detial"> https://www.roomtoread.org/ seeks to transform the lives of millions of children in
                                        low-income communities by focusing on literacy and gender equality in education. Working in collaboration with local
                                        communities, partner organizations and governments, we develop literacy skills and a habit of reading among primary
                                        school children, and support girls to complete secondary school with the relevant life skills to succeed in school and
                                        beyond. Registered charity no. 1125803.
                                    </div>
                                    <span class="css-yit-donation-check">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="radio" name="inlineRadioOptions" id="charity13" value="option1">
                    <label class="form-check-label custom-control-label" for="charity13"></label>
                  </div>
                  </span></div>
                                <span class="css-yi-info-btn"> <a href="javascript:;" class="" data-isonotification_id="" data-index="13">Read More <i
                                                class="fa fa-caret-down"> </i></a> </span></div>
                        </div>
                    </div>
                    <!-------/Find Charity Box-------->


                    <!-------Find Charity Box-------->
                    <div class="col-sm-6 col-md-4 findCharity">
                        <div class="info-box css-yit-donation-box"><span class="info-box-icon bg-aqua"> <img
                                        src="{{asset('letsbab/shop/images/lets-share/hQCf0Oh28lz2AgFO9uM1hnLAYgHiSYZuFSXYcowI.png')}}" width="100"> </span>
                            <div class="info-box-content">
                                <div class="info-box-detail">
                                    <span class="info-box-text">Crisis Text Line</span>
                                    <span class="info-box-des"></span>
                                    <span class="info-box-excerpt">Crisis Text Line provides...</span>
                                    <div class="css-yit-info-detial"> Crisis Text Line provides free crisis support at your fingertips, 24/7. We believe that
                                        every person who texts us deserves a human response.
                                    </div>
                                    <span class="css-yit-donation-check">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="radio" name="inlineRadioOptions" id="charity14" value="option1">
                    <label class="form-check-label custom-control-label" for="charity14"></label>
                  </div>
                  </span></div>
                                <span class="css-yi-info-btn"> <a href="javascript:;" class="" data-isonotification_id="" data-index="14">Read More <i
                                                class="fa fa-caret-down"> </i></a> </span></div>
                        </div>
                    </div>
                    <!-------/Find Charity Box-------->


                    <!-------Find Charity Box-------->
                    <div class="col-sm-6 col-md-4 findCharity">
                        <div class="info-box css-yit-donation-box"><span class="info-box-icon bg-aqua"> <img
                                        src="{{asset('letsbab/shop/images/lets-share/wKjwEzzc0hNqubdYOtvkVbgtJRA6FRWvD5HSPpQF.png')}}" width="100"> </span>
                            <div class="info-box-content">
                                <div class="info-box-detail">
                                    <span class="info-box-text">Project AWARE</span>
                                    <span class="info-box-des"></span>
                                    <span class="info-box-excerpt">Project AWARE® is a glob...</span>
                                    <div class="css-yit-info-detial"> Project AWARE® is a global movement for ocean protection powered by a community of
                                        adventurers. We connect the passion for ocean adventure with the purpose of marine conservation.
                                    </div>
                                    <span class="css-yit-donation-check">
                  <div class="custom-control custom-checkbox">
                    <input class="custom-control-input" type="radio" name="inlineRadioOptions" id="charity15" value="option1">
                    <label class="form-check-label custom-control-label" for="charity15"></label>
                  </div>
                  </span></div>
                                <span class="css-yi-info-btn"> <a href="javascript:;" class="" data-isonotification_id="" data-index="15">Read More <i
                                                class="fa fa-caret-down"> </i></a> </span></div>
                        </div>
                    </div>
                    <!-------/Find Charity Box-------->


                    <div class="saveCharity">
                        <div class="container">
                            <button type="submit" class="btn btn-primary"> Save charity setting</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-------/Main Wrapper-------->

</div>
<!-------/Main Container-------->

@include('shop.template.include.footer')

<!-- Optional JavaScript -->

<script src="{{asset('letsbab/shop/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('letsbab/shop/js/popper.js')}}"></script>
<script src="{{asset('letsbab/shop/js/bootstrap-material-design.js')}}"></script>
<script src="{{asset('letsbab/shop/js/jquery.appear.js')}}"></script>
<script src="{{asset('letsbab/shop/js/slick.min.js')}}"></script>
<script src="{{asset('letsbab/shop/js/bootstrap-slider.js')}}"></script>
<script src="{{asset('letsbab/shop/js/custom.js')}}"></script>

<script>
    $('#site-header').addClass('innerpage-header');
</script>

<script>
    /**
     * Enable slider
     */
    $('#share_percentage').slider({
        tooltip: 'always',
        formatter: function (value) {
            return '' + value + '%';
        }
    });


    $('.css-yi-info-btn a').each(function (index) {
        jQuery(this).attr('data-index', index);
    });
    $('.css-yi-info-btn a').on('click', function () {
        var index = jQuery(this).attr('data-index');
        var parent_box = $(this).closest('.findCharity');
        parent_box.siblings().find('.css-yit-info-detial').slideUp();
        parent_box.find('.css-yit-info-detial').slideToggle(500, 'swing');
        jQuery('.css-yi-info-btn a').find('i').attr('class', 'fa fa-caret-down');
        jQuery('.info-box-content .info-box-excerpt').removeClass('hide-excerpt');
        if (jQuery(this).hasClass('current-readmore')) {
            jQuery(this).find('i').attr('class', 'fa fa-caret-down');
            jQuery(this).removeClass('current-readmore');
            jQuery(this).parents('.info-box-content').find('.info-box-excerpt').removeClass('hide-excerpt');
        } else {
            jQuery(this).find('i').attr('class', 'fa fa-caret-up');
            jQuery(this).addClass('current-readmore');
            jQuery(this).parents('.info-box-content').find('.info-box-excerpt').addClass('hide-excerpt');
        }
        jQuery('.css-yi-info-btn a.current-readmore').each(function () {
            var index2 = jQuery(this).attr('data-index');
            if (index2 != index) {
                jQuery(this).removeClass('current-readmore');
                jQuery(this).parents('.info-box-content').find('.info-box-excerpt').removeClass('hide-excerpt');
            }
        });
    });


    $(window).bind('scroll', function () {
        if ($(window).scrollTop() >= $('.findCharitywrap').offset().top + $('.findCharitywrap').outerHeight() - window.innerHeight) {
            jQuery('.saveCharity').addClass('stickybtm');
        } else if (jQuery(document).height() - $(window).scrollTop() >= 500) {
            jQuery('.saveCharity').removeClass('stickybtm');
        }
    });


    $(function () {
        var header = $(".filterSlider");
        $(window).scroll(function () {
            var scroll = $(window).scrollTop();

            if (scroll >= 200) {
                header.removeClass('filterSlider1').addClass("filterSlider-alt");
            } else {
                header.removeClass("filterSlider-alt").addClass('filterSlider');
            }
        });
    });


</script>

</body>
</html>