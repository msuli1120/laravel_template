<h1>Thanks for joining XingApps</h1>
<p>Please <a href="{{ route('emailVerified', ['email' => urlencode(strtolower($user->email)), 'verifyToken' => $user->verifyToken]) }}">click here </a>to verify your email.</p>