@extends('layouts.app')
@section('title', 'Terms of Service of ' . config('app.name'))

@section('content')
    <section class="section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="sa-section-title">
                        <h2>Terms of Service</h2>
                        <p>These terms of service outline the rules and regulations for the use of {{ config('app.name') }}'s Website.</p>
{{--                        <span style="text-transform: capitalize;"> {{ config('app.name') }}</span> is located at:<br />--}}
{{--                        <address><br />--}}
{{--                        </address>--}}
                        <p>By accessing this website we assume you accept these terms of service in full. Do not continue to use {{ config('app.name') }}'s website
                            if you do not accept all of the terms of service stated on this page.</p>
                        <p>The following terminology applies to these Terms and Conditions, Privacy Statement and Disclaimer Notice
                            and any or all Agreements: “Client”, “You” and “Your” refers to you, the person accessing this website
                            and accepting the Company’s terms of service. “The Company”, “Ourselves”, “We”, “Our” and “Us”, refers
                            to our Company. “Party”, “Parties”, or “Us”, refers to both the Client and ourselves, or either the Client
                            or ourselves. Any use of the above terminology or other words in the singular, plural,
                            capitalisation and/or he/she or they, are taken as interchangeable and therefore as referring to same.</p>
                        <h2>License</h2>
                        <p>Unless otherwise stated, {{ config('app.name') }} and/or it’s licensors own the intellectual property rights for
                            all material on {{ config('app.name') }}. All intellectual property rights are reserved. You may view and/or print
                            pages from {{ config('app.url') }} for your own personal use subject to restrictions set in these terms of service.</p>
                        <p>You must not:</p>
                        <ol>
                            <li>Republish material from {{ config('app.url') }}</li>
                            <li>Sell, rent or sub-license material from {{ config('app.url') }}</li>
                            <li>Reproduce, duplicate or copy material from {{ config('app.url') }}</li>
                            <li>Redistribute content from {{ config('app.name') }} (unless content is specifically made for redistribution).</li>
                        </ol>

{{--                        <h2>User Comments</h2>--}}
{{--                        <ol>--}}
{{--                            <li>This Agreement shall begin on the date hereof.</li>--}}
{{--                            <li>Certain parts of this website offer the opportunity for users to post and exchange opinions, information,--}}
{{--                                material and data ('Comments') in areas of the website. {{ config('app.name') }} does not screen, edit, publish--}}
{{--                                or review Comments prior to their appearance on the website and Comments do not reflect the views or--}}
{{--                                opinions of{{ config('app.name') }}, its agents or affiliates. Comments reflect the view and opinion of the--}}
{{--                                person who posts such view or opinion. To the extent permitted by applicable laws {{ config('app.name') }}shall--}}
{{--                                not be responsible or liable for the Comments or for any loss cost, liability, damages or expenses caused--}}
{{--                                and or suffered as a result of any use of and/or posting of and/or appearance of the Comments on this--}}
{{--                                website.</li>--}}
{{--                            <li>{{ config('app.name') }}reserves the right to monitor all Comments and to remove any Comments which it considers--}}
{{--                                in its absolute discretion to be inappropriate, offensive or otherwise in breach of these Terms and Conditions.</li>--}}
{{--                            <li>You warrant and represent that:--}}
{{--                                <ol>--}}
{{--                                    <li>You are entitled to post the Comments on our website and have all necessary licenses and consents to--}}
{{--                                        do so;</li>--}}
{{--                                    <li>The Comments do not infringe any intellectual property right, including without limitation copyright,--}}
{{--                                        patent or trademark, or other proprietary right of any third party;</li>--}}
{{--                                    <li>The Comments do not contain any defamatory, libelous, offensive, indecent or otherwise unlawful material--}}
{{--                                        or material which is an invasion of privacy</li>--}}
{{--                                    <li>The Comments will not be used to solicit or promote business or custom or present commercial activities--}}
{{--                                        or unlawful activity.</li>--}}
{{--                                </ol>--}}
{{--                            </li>--}}
{{--                            <li>You hereby grant to <strong>{{ config('app.name') }}</strong> a non-exclusive royalty-free license to use, reproduce,--}}
{{--                                edit and authorize others to use, reproduce and edit any of your Comments in any and all forms, formats--}}
{{--                                or media.</li>--}}
{{--                        </ol>--}}
                        <h2>Hyperlinking to our Content</h2>
                        <ol>
                            <li>The following organizations may link to our Web site without prior written approval:
                                <ol>
                                    <li>Government agencies;</li>
                                    <li>Search engines;</li>
                                    <li>News organizations;</li>
                                    <li>Online directory distributors when they list us in the directory may link to our Web site in the same
                                        manner as they hyperlink to the Web sites of other listed businesses; and</li>
                                    <li>Systemwide Accredited Businesses except soliciting non-profit organizations, charity shopping malls,
                                        and charity fundraising groups which may not hyperlink to our Web site.</li>
                                </ol>
                            </li>
                        </ol>
                        <ol start="2">
                            <li>These organizations may link to our home page, to publications or to other Web site information so long
                                as the link: (a) is not in any way misleading; (b) does not falsely imply sponsorship, endorsement or
                                approval of the linking party and its products or services; and (c) fits within the context of the linking
                                party's site.
                            </li>
                            <li>We may consider and approve in our sole discretion other link requests from the following types of organizations:
                                <ol>
                                    <li>commonly-known consumer and/or business information sources;</li>
                                    <li>dot.com community sites;</li>
                                    <li>associations or other groups representing charities, including charity giving sites,</li>
                                    <li>online directory distributors;</li>
                                    <li>internet portals;</li>
                                    <li>accounting, law and consulting firms whose primary clients are businesses; and</li>
                                    <li>educational institutions and trade associations.</li>
                                </ol>
                            </li>
                        </ol>
                        <p>We will approve link requests from these organizations if we determine that: (a) the link would not reflect
                            unfavorably on us or our accredited businesses (for example, trade associations or other organizations
                            representing inherently suspect types of business, such as work-at-home opportunities, shall not be allowed
                            to link); (b)the organization does not have an unsatisfactory record with us; (c) the benefit to us from
                            the visibility associated with the hyperlink outweighs the absence of {{ config('app.name') }}; and (d) where the
                            link is in the context of general resource information or is otherwise consistent with editorial content
                            in a newsletter or similar product furthering the mission of the organization.</p>

                        <p>These organizations may link to our home page, to publications or to other Web site information so long as
                            the link: (a) is not in any way misleading; (b) does not falsely imply sponsorship, endorsement or approval
                            of the linking party and it products or services; and (c) fits within the context of the linking party's
                            site.</p>

                        <p>Approved organizations may hyperlink to our Web site as follows:</p>

                        <ol>
                            <li>By use of our name; or</li>
                            <li>By use of the uniform resource locator (Web address) being linked to; or</li>
                            <li>By use of any other description of our Web site or material being linked to that makes sense within the
                                context and format of content on the linking party's site.</li>
                        </ol>
                        <p>No use of {{ config('app.name') }}’s logo or other artwork will be allowed for linking absent a trademark license
                            agreement.</p>
                        <h2>Reservation of Rights</h2>
                        <p>We reserve the right at any time and in its sole discretion to request that you remove all links or any particular
                            link to our Web site. You agree to immediately remove all links to our Web site upon such request. We also
                            reserve the right to amend these terms of service and its linking policy at any time. By continuing
                            to link to our Web site, you agree to be bound to and abide by these linking terms of service.</p>
                        <h2>Content Liability</h2>
                        <p>We shall have no responsibility or liability for any content appearing on your Web site. You agree to indemnify
                            and defend us against all claims arising out of or based upon your Website. No link(s) may appear on any
                            page on your Web site or within any context containing content or materials that may be interpreted as
                            libelous, obscene or criminal, or which infringes, otherwise violates, or advocates the infringement or
                            other violation of, any third party rights.</p>
                        <h2>Disclaimer</h2>
                        <p>To the maximum extent permitted by applicable law, we exclude all representations, warranties and conditions relating to our website and the use of this website (including, without limitation, any warranties implied by law in respect of satisfactory quality, fitness for purpose and/or the use of reasonable care and skill). Nothing in this disclaimer will:</p>
                        <ol>
                            <li>limit or exclude our or your liability for death or personal injury resulting from negligence;</li>
                            <li>limit or exclude our or your liability for fraud or fraudulent misrepresentation;</li>
                            <li>limit any of our or your liabilities in any way that is not permitted under applicable law; or</li>
                            <li>exclude any of our or your liabilities that may not be excluded under applicable law.</li>
                        </ol>
                        <p>The limitations and exclusions of liability set out in this Section and elsewhere in this disclaimer: (a)
                            are subject to the preceding paragraph; and (b) govern all liabilities arising under the disclaimer or
                            in relation to the subject matter of this disclaimer, including liabilities arising in contract, in tort
                            (including negligence) and for breach of statutory duty.</p>
                        <p>To the extent that the website and the information and services on the website are provided free of charge,
                            we will not be liable for any loss or damage of any nature.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
