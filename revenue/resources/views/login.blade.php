<!-- resources/views/login.blade.php -->
@extends('layouts.app')

@section('title', 'Login - SUNEF')

@section('content')
    <div id="root"></div>
@endsection

@section('scripts')
    <script type="text/babel">
        function LoginPage() {
            const [isForgotPassword, setIsForgotPassword] = React.useState(false);
            const [email, setEmail] = React.useState('');
            const [username, setUsername] = React.useState('');
            const [password, setPassword] = React.useState('');

            const handleForgotPassword = () => setIsForgotPassword(true);
            const handleRememberedPassword = () => setIsForgotPassword(false);


    const handleLoginSubmit = async (e) => {
    e.preventDefault();

    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute("content");

    const response = await fetch("/", {
        method: "POST",
        headers: {
            "Content-Type": "application/json",
            "X-CSRF-TOKEN": csrfToken,
            "Accept": "application/json"
        },
        body: JSON.stringify({
            username: username,
            password: password
        })
    });

    const data = await response.json();

    if (response.ok && data.redirect) {
        window.location.href = data.redirect;
    } else {
        alert(data.message || "Login failed");
    }
};



            const handleForgotSubmit = (e) => {
                e.preventDefault();
                alert('Password reset request sent for: ' + email);
            };

            React.useEffect(() => {
                $('.select2, .select3, .select4').select2();
            }, []);

            return (
                <div className="login-box flex items-center justify-center min-h-screen px-4">
                    <div className="bg-white p-8 rounded-lg shadow-2xl w-full max-w-md relative">
                        <img src="/images/sunef.png" alt="SUNEF Logo"
                             className="absolute -top-20 left-1/2 transform -translate-x-1/2 w-32" />
                        <div className="text-center mb-6">
                            <h1 className="text-3xl font-bold text-red-600">SUNEF</h1>
                            <h5 className="text-gray-600 mt-2">
                                {isForgotPassword ? 'Forgot Password?' : 'Sign In'}
                            </h5>
                        </div>
                        {isForgotPassword ? (
                            <form onSubmit={handleForgotSubmit} className="space-y-6">
                                <div className="input-group flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                    <span className="input-group-addon">
                                        <i className="fas fa-user text-gray-500"></i>
                                    </span>
                                    <div className="form-line flex-1">
                                        <input
                                            type="text"
                                            className="form-control w-full p-3 text-gray-700 focus:outline-none"
                                            placeholder="Enter Your Username"
                                            value={email}
                                            onChange={(e) => setEmail(e.target.value)}
                                            autoFocus
                                        />
                                    </div>
                                </div>
                                <button type="submit"
                                        className="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 flex items-center justify-center gap-2">
                                    <i className="fas fa-paper-plane"></i> Send
                                </button>
                                <div className="text-right">
                                    <button type="button"
                                            className="text-blue-600 hover:underline flex items-center gap-1"
                                            onClick={handleRememberedPassword}>
                                        <i className="fas fa-lock"></i> I remembered my password, Login
                                    </button>
                                </div>
                            </form>
                        ) : (
                            <form onSubmit={handleLoginSubmit} className="space-y-6">
                                <img src="/images/sunef.png" alt="SUNEF Logo" className="w-full mb-6" />
                                <div className="input-group flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                    <span className="input-group-addon">
                                        <i className="fas fa-user text-gray-500"></i>
                                    </span>
                                    <div className="form-line flex-1">
                                        <input
                                            type="text"
                                            className="form-control w-full p-3 text-gray-700 focus:outline-none"
                                            placeholder="Enter Username"
                                            value={username}
                                            onChange={(e) => setUsername(e.target.value)}
                                            autoFocus
                                        />
                                    </div>
                                </div>
                                <div className="input-group flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                    <span className="input-group-addon">
                                        <i className="fas fa-lock text-gray-500"></i>
                                    </span>
                                    <div className="form-line flex-1">
                                        <input
                                            type="password"
                                            className="form-control w-full p-3 text-gray-700 focus:outline-none"
                                            placeholder="Enter Password"
                                            value={password}
                                            onChange={(e) => setPassword(e.target.value)}
                                        />
                                    </div>
                                </div>
                                <button type="submit"
                                        className="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 flex items-center justify-center gap-2">
                                    SIGN IN
                                </button>
                                <div className="text-right">
                                    <button type="button"
                                            className="text-blue-600 hover:underline flex items-center gap-1"
                                            onClick={handleForgotPassword}>
                                        Forgot Password <i className="fas fa-question-circle"></i>
                                    </button>
                                </div>

                                


                            </form>
                        )}
                    </div>
                </div>
            );
        }

        ReactDOM.render(<LoginPage />, document.getElementById('root'));
    </script>
@endsection
