import { Link, useNavigate } from "react-router-dom";
import { useState, useEffect } from "react";
import { auth, logInWithEmailAndPassword, signInWithGoogle } from "./firebase";
import { useAuthState } from "react-firebase-hooks/auth";

function Login() {
    const [email, setEmail] = useState("");
    const [password, setPassword] = useState("");
    const [user, loading, error] = useAuthState(auth);
    const navigate = useNavigate();

    useEffect(() => {
        if (loading) {
            console.log("loading...");
            return;
        }
        if (user) navigate("/dashboard");
    }, [user, loading]);

    return (
        <>
            <div className="flex flex-col items-center justify-center h-screen">
                <div className="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                    <div className="mb-4">
                        <h1 className="text-2xl font-bold text-center">
                            Login
                        </h1>
                    </div>
                    <div className="mb-4">
                        <label className="block text-gray-700 text-sm font-bold mb-2">Email</label>
                        <input
                            className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="email"
                            placeholder="Email"
                            value={email}
                            onChange={(e) => setEmail(e.target.value)}
                        />
                    </div>
                    <div className="mb-6">
                        <label className="block text-gray-700 text-sm font-bold mb-2">Password</label>
                        <input
                            className="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
                            type="password"
                            placeholder="Password"
                            value={password}
                            onChange={(e) => setPassword(e.target.value)}
                        />

                        <Link to="/reset">
                            <span className="text-sm hover:text-red-500 text-red-700">Forgot Password</span>
                        </Link>

                    </div>
                    <div className="flex items-center justify-between">
                        <button
                            className="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mr-3"
                            onClick={() => logInWithEmailAndPassword(email, password)}
                        >Sign In</button>
                        <button
                            className="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                            onClick={() => signInWithGoogle()}
                        >Sign In with Google</button>
                    </div>

                    <div className="text-center text-gray-500 text-xs mt-2">
                        <span className="text-small">
                            Don't have an account?
                        </span>
                        <Link to="/register">
                            <span className="text-small font-bold hover:text-blue-500 text-blue-700"> Register</span>
                        </Link>
                    </div>
                </div>
            </div>
        </>
    );
}

export default Login;