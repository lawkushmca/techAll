@extends('layouts.main')

@section('title', 'Organizations')

@section('content')
    <style>
        .img-box img {
            border-radius: 10px;
        }
        .detail-box h5 {
            font-style: italic;
        }
        .org-members {
            width: 100%;
            margin-bottom: 2rem;
            padding: 1rem 1rem 1rem 1rem;
            background: #e7e7e7;
            border: 1px solid #f3f3f3;
        }
        .detail-box {
            padding-left: 1rem;
            padding-right: 1rem;
        }
    </style>
    <div class="login-container">
        <div class="form-wrapper-guest row">

            <section class="org-members">

                <div class="row">
                    <div class="col-md-3">
                        <div class="img-box">
                            <img src="img/adit.webp" alt="" class="img-responsive" width="100%" height="50%">

                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h1>Adit Nikhil</h1>
                                <h5>Founder, Tech4All, Bangalore</h5>
                            </div>
                            <p class="text-description" style="text-align:justify;">
                                My name is Adit Nikhil, and I am the Founder of Tech4All. Presently enrolled in the IB curriculum at TISB, I aspire to pursue a degree in economics and finance in the future. Since the age of 7, I have been involved in social service projects and to this day, donate to the community actively. In 2019, I founded Tech4All; I observed the root causes of the poverty cycle in the lack of education and skill mismatch and thus, ventured into breaking the poverty cycle for the underprivileged students in my community. In the past 4 years, Tech4All has digitised several students’ lives and provided free tuitions, helping underprivileged students achieve their goals. Aside from these achievements, at the heart of Tech4All is the philosophy that the “greatest donation is the gift of time”; we aim to develop relationships with these students and together, help them achieve their dreams and break the chains of poverty.
                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="org-members">

                <div class="row">
                    <div class="col-md-3">
                        <div class="img-box">
                            <img src="img/aditya.webp" alt="" width="100%" height="50%">

                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h1>Aditya Gupta</h1>
                                <h5>Head of Technology, Head of Operations, Tech4All, Hyderabad</h5>
                            </div>
                            <p class="text-description" style="text-align:justify;">
                                My name is Aditya Gupta, I'm the Head of Technology and Head of Marketing for Tech4All. I'm currently enrolled in the IBDP curriculum at Oakridge International School. I have a passion towards computers, and aim to obtain a Computer Science degree in the future. I have been a member of Tech4All since it's inception, during 2019. It was an eye-opening experience visiting Chavadi Ashramam for the first time, as it made me truly realise the struggles faced by these underprivileged children. Since then, I have been dedicated towards improving the their lives. Whether it's simple acts like conducting a fundraiser, to arranging online tutoring sessions for them and providing mentorship and guidance. I am a part of this to create equal opportunities for these children so even they can achieve their dreams.                            </p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="org-members">

                <div class="row">
                    <div class="col-md-3">
                        <div class="img-box">
                            <img src="img/man.webp" alt="" width="100%" height="50%">

                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h1>Mannan Gupta</h1>
                                <h5>Co-Head of Tech4All, UK, London</h5>
                            </div>
                            <p class="text-description" style="text-align:justify;">
                                I'm excited to commence my involvement with Tech4All, a visionary charity committed to equipping children with the transformative power of technology for education. Joining this organization aligns perfectly with my belief in the potential of tech to bridge educational gaps and shape a brighter future. It's an honor to be part of a team that strives to make quality education accessible to every child, and I'm eager to contribute my skills and dedication to this vital mission, knowing the positive impact it will have on countless young minds.
                        </div>
                    </div>
                </div>
            </section>

            <section class="org-members">

                <div class="row">
                    <div class="col-md-3">
                        <div class="img-box">
                            <img src="img/Anu.webp" alt="" width="100%" height="50%">

                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h1>Anubhav Phukan</h1>
                                <h5>CoHead of Tech4All, UK, London</h5>
                            </div>
                            <p class="text-description" style="text-align:justify;">
                                The butterfly effect is a theory that states that small causes can lead to larger effects in our world. I live by this theory, thinking about what actions I can take no matter how small or big, to have a larger impact on our world. For this reason, I joined Tech4All as the Co-Head of the UK branch; I sincerely believe through my efforts to fundraise here in the UK, I can help Tech4All with its goal of giving underprivileged children greater opportunities and unlocking their hidden potential. This hidden potential, once uncovered, has the ability to transform society and the world as we know it. In addition, I feel that Tech4All will be able to help these children break free from the vicious cycle of poverty, so that their children and grandchildren and so on can live better lives, in an improved society which recognises the value of egalitarianism.
                            </p>
                        </div>

                    </div>
                </div>
            </section>

            <section class="org-members">

                <div class="row">
                    <div class="col-md-3">
                        <div class="img-box">
                            <img src="img/hari.webp" alt="" width="100%" height="50%">

                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h1>Harika Suryadevara</h1>
                                <h5>Head of Human Resources, Tech4All, Hyderabad</h5>
                            </div>
                            <p class="text-description" style="text-align:justify;">
                                I’m Harika- the Head of HR of Tech4all. I’m currently in the IBDP curriculum at Oakridge International School. Apart from my passion to pursue Economics as my major in college, I am also a music enthusiast and a swimmer. Playing piano since the age of six, I have performed in many school events and recitals. I have always been determined to contribute the best I can to the betterment of the society, and Tech4all has paved the way for this.
                                <br>
                                As the Head of HR of this organisation, I believe that quality education is mandatory for every child in the society and thus, financial problems should not be an obstacle to accomplish this. Our organisation aims to ensure that every underprivileged child has the access to quality education and technology, which has evidently developed in the past decade.
                            </p>
                        </div>

                    </div>
                </div>
            </section>

            <section class="org-members">

                <div class="row">
                    <div class="col-md-3">
                        <div class="img-box">
                            <img src="img/soh.webp" alt="" width="100%" height="50%">

                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h1>Soham Tibrewala</h1>
                                <h5>Head of Finance, Tech4All, Bangalore</h5>
                            </div>
                            <p class="text-description" style="text-align:justify;">
                                I am Soham and I joined Tech4All in September 2022 as the head of finance. Being able to play my part in contributing to the community is something that gives me a lot of privilege and I am grateful to Tech4All for providing that opportunity to me. In the end it is all about the happiness that is spread in these children and I am lucky to play a part, even if it is a small one.
                            </p>
                        </div>

                    </div>
                </div>
            </section>

            <section class="org-members">

                <div class="row">
                    <div class="col-md-3">
                        <div class="img-box">
                            <img src="img/teja.webp" alt="" width="100%" height="50%">

                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h1>Teja Mannava</h1>
                                <h5>Head Volunteer of Hyderabad</h5>
                            </div>
                            <p class="text-description" style="text-align:justify;">
                                Tech4all is an ambitious project to say the least. The work that was put into it and the genuine desire to help those in need is what tech4all is founded from. It's an organization that I'm glad I joined because the sheer amount of help we can provide and how much that'll improve the lives of underprivileged kids deserves to succeed and is a noble cause that I'm more than happy to support.                            </p>
                        </div>

                    </div>
                </div>
            </section>

            <section class="org-members">

                <div class="row">
                    <div class="col-md-3">
                        <div class="img-box">
                            <img src="img/dhr.webp" alt="" width="100%" height="50%">

                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="detail-box">
                            <div class="heading_container">
                                <h1>Dhrithi Kiran</h1>
                                <h5>Head Volunter of Bangalore</h5>
                            </div>
                            <p class="text-description" style="text-align:justify;">
                                My name is Dhrithi and I am 17 years old. I am currently studying in Bangalore, my hometown. I live in a small city called Ahmednagar, in Maharashtra. I am multilingual and love listening to music of all genres. I have been part of Tech4All since September 2022. I am really fortunate to be part of Tech4All as I am able to give back to the community and its development. I have always liked interacting with people from different communities and decided to utilise this skill for a good cause.
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
