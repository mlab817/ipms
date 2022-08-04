import React, {useEffect, useState} from 'react';
import { Link, useForm } from '@inertiajs/inertia-react';
import {Avatar, Box, Button, FormControl, Heading, TextInput} from "@primer/react";
import {EyeClosedIcon, EyeIcon, LockIcon, PersonIcon} from "@primer/octicons-react";

const Login = ({ status, canResetPassword }) => {
    const [showPassword, setShowPassword] = useState(false)

    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
    });

    useEffect(() => {
        return () => {
            reset('password');
        };
    }, []);

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.value);
    };

    const submit = (e) => {
        e.preventDefault();

        post(route('login'));
    };

    const togglePassword = () => setShowPassword(!showPassword)

    return (
        <Box display="flex" flex={1} height="100vh" flexDirection="column" justifyContent="center" maxWidth={360} mx="auto">
            <Box display="flex" flexDirection="column" alignItems="center">
                <Avatar src={`/logo.png`} size={100} alt="logo" />
                <Heading as="h4">Login to PIPS</Heading>
            </Box>

            {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}

            <form onSubmit={submit}>
                <Box mt={5}>
                    <FormControl>
                        <FormControl.Label forInput="email">
                            Username or Email
                        </FormControl.Label>

                        <TextInput
                            type="text"
                            name="email"
                            value={data.email}
                            block
                            autoComplete="username"
                            isFocused={true}
                            onChange={onHandleChange}
                            leadingVisual={PersonIcon}
                        />
                    </FormControl>
                </Box>

                <Box mt={3}>
                    <FormControl>
                        <FormControl.Label forInput="password">
                            Password
                        </FormControl.Label>

                        <TextInput
                            type={showPassword ? 'text' : 'password' }
                            name="password"
                            value={data.password}
                            block
                            autoComplete="current-password"
                            onChange={onHandleChange}
                            leadingVisual={LockIcon}
                            trailingAction={<TextInput.Action
                                onClick={togglePassword}
                                icon={showPassword ? EyeClosedIcon : EyeIcon}
                                aria-label="show/hide password"
                            />}
                        />
                    </FormControl>
                </Box>

                <Box mt={3}>
                    <Button variant="primary" processing={processing} sx={{ width: '100%' }}>
                        Log in
                    </Button>
                </Box>

                <Box mt={3}>
                    <Link href={route('auth.google')}>
                        Sign in Google
                    </Link>
                </Box>
            </form>

            <Box mt={3} display="flex" justifyContent="center">
                {canResetPassword && (
                    <Link
                        href={route('password.request')}
                    >
                        Forgot your password?
                    </Link>
                )}
            </Box>

            <Box border={1} borderStyle="solid" borderColor="border.default" borderRadius={1} p={3} justifyContent="center" display="flex" mt={5}>
                &copy; 2022 Investment Programming Division
            </Box>
        </Box>
    );
}

export default Login
