@extends('layouts.app')

@section('title', 'Register - SUNEF')

@section('content')
    <div id="root"></div>
@endsection

@section('scripts')
    <script type="text/babel">
        function RegisterPage() {
            const [name, setName] = React.useState('');
            const [username, setUsername] = React.useState('');
            const [email, setEmail] = React.useState('');
            const [password, setPassword] = React.useState('');
            const [confirmPassword, setConfirmPassword] = React.useState('');

            const handleRegisterSubmit = (e) => {
                e.preventDefault();
                if (password !== confirmPassword) {
                    alert('Passwords do not match!');
                    return;
                }
                alert('Register submitted: ' + username + ', ' + email);
                // Later: send this to Laravel backend via fetch/Axios or form post
            };

            return (
                <div className="login-box flex items-center justify-center min-h-screen px-4">
                    <div className="bg-white p-8 rounded-lg shadow-2xl w-full max-w-md relative">
                        <img src="/images/sunef.png" alt="SUNEF Logo"
                             className="absolute -top-20 left-1/2 transform -translate-x-1/2 w-32" />
                        <div className="text-center mb-6">
                            <h1 className="text-3xl font-bold text-green-600">SUNEF</h1>
                            <h5 className="text-gray-600 mt-2">Create an Account</h5>
                        </div>
                        <form onSubmit={handleRegisterSubmit} className="space-y-6">
                            <div className="input-group flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                <span className="input-group-addon">
                                    <i className="fas fa-user text-gray-500"></i>
                                </span>
                                <div className="form-line flex-1">
                                    <input
                                        type="text"
                                        className="form-control w-full p-3 text-gray-700 focus:outline-none"
                                        placeholder="Full Name"
                                        value={name}
                                        onChange={(e) => setName(e.target.value)}
                                        required
                                    />
                                </div>
                            </div>
                            <div className="input-group flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                <span className="input-group-addon">
                                    <i className="fas fa-id-badge text-gray-500"></i>
                                </span>
                                <div className="form-line flex-1">
                                    <input
                                        type="text"
                                        className="form-control w-full p-3 text-gray-700 focus:outline-none"
                                        placeholder="Username"
                                        value={username}
                                        onChange={(e) => setUsername(e.target.value)}
                                        required
                                    />
                                </div>
                            </div>
                            <div className="input-group flex items-center border border-gray-300 rounded-lg overflow-hidden">
                                <span className="input-group-addon">
                                    <i className="fas fa-envelope text-gray-500"></i>
                                </span>
                                <div className="form-line flex-1">
                                    <input
                                        type="email"
                                        className="form-control w-full p-3 text-gray-700 focus:outline-none"
                                        placeholder="Email"
                                        value={email}
                                        onChange={(e) => setEmail(e.target.value)}
                                        required
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
                                        placeholder="Password"
                                        value={password}
                                        onChange={(e) => setPassword(e.target.value)}
                                        required
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
                                        placeholder="Confirm Password"
                                        value={confirmPassword}
                                        onChange={(e) => setConfirmPassword(e.target.value)}
                                        required
                                    />
                                </div>
                            </div>
                            <button
                                type="submit"
                                className="w-full bg-blue-600 text-white py-3 rounded-lg hover:bg-blue-700 flex items-center justify-center gap-2"
                            >
                                <i className="fas fa-user-plus"></i> Register
                            </button>
                            <div className="text-center mt-4">
                                <p className="text-gray-600">
                                    Already have an account?{' '}
                                    <a href="/" className="text-blue-500 hover:underline">
                                        Login
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            );
        }

        ReactDOM.render(<RegisterPage />, document.getElementById('root'));
    </script>
@endsection
