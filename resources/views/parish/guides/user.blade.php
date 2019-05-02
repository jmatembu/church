<article>
    <div class="mb-5">
        <h3 class="h2">What is {{ config('app.name') }}</h3>
        <p>{{ config('app.name') }} is a <strong>forever free</strong> service that enables any Catholic Parish grow its online community. As a member, you get to know what's going on in and around your parish.</p>
        <p>As of this writing, using your <strong>{{ config('app.name') }}</strong> account, you can:</p>
        <ul>
            <li>View parish news, events and projects</li>
            <li>Contact the parish directly</li>
            <li>Submit community prayer requests that are visible the public. Community prayer requests allow other members to privately join you in praying for your intentions.</li>
        </ul>
        <p>There are many more features coming up. You can <a href="{{ route('home') }}">read about these upcoming features</a> on the home page. Should you have any idea to share with us, please send us a message using the feedback form which is also available on the home page.</p>
    </div>
    <div class="mb-5">
        <h3 class="h2">Your Member Account</h3>
        <p>This section introduces you to your parish member account by taking you through what each page has for you. If you are already familiar with online communities or social media, you should find it extremely easy using your account.</p>

        <h4 class="h3">Dashboard</h4>
        <p>This is the page you see first when accessing your account. It shows basic reports such as number of prayer requests, of mass intentions submitted and among others, your latest activity.</p>
        <h4 class="h3">Prayer Requests</h4>
        <p>On this page, you can add, edit and delete prayer requests. Prayer request are public.</p>
        <h4 class="h3">My Settings</h4>
        Set your default parish from here. You should set your default to:
        <ul>
            <li>Skip the process of finding your parish on the public site.</li>
            <li>View member only sections - <em>Not yet empimentated</em></li>
        </ul>
    </div>
</article>
