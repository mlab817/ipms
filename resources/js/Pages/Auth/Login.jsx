import React, { useEffect } from 'react';
import Checkbox from '@/Components/Checkbox';
import Input from '@/Components/Input';
import Label from '@/Components/Label';
import ValidationErrors from '@/Components/ValidationErrors';
import { Head, Link, useForm } from '@inertiajs/inertia-react';
import {Box, Button, FormControl, Header, TextInput} from "@primer/react";

const Login = ({ status, canResetPassword }) => {
    const { data, setData, post, processing, errors, reset } = useForm({
        email: '',
        password: '',
        remember: '',
    });

    useEffect(() => {
        return () => {
            reset('password');
        };
    }, []);

    const onHandleChange = (event) => {
        setData(event.target.name, event.target.type === 'checkbox' ? event.target.checked : event.target.value);
    };

    const submit = (e) => {
        e.preventDefault();

        post(route('login'));
    };

    return (
        <Box display="flex">
            {status && <div className="mb-4 font-medium text-sm text-green-600">{status}</div>}

            <ValidationErrors errors={errors} />

            <form onSubmit={submit} className="col-md-4 mx-auto mt-10">
                <FormControl>
                    <FormControl.Label forInput="email">
                        Email
                    </FormControl.Label>

                    <TextInput
                        type="text"
                        name="email"
                        value={data.email}
                        block
                        autoComplete="username"
                        isFocused={true}
                        handleChange={onHandleChange}
                    />
                </FormControl>

                <FormControl>
                    <FormControl.Label forInput="password">
                        Password
                    </FormControl.Label>

                    <TextInput
                        type="password"
                        name="password"
                        value={data.password}
                        block
                        autoComplete="current-password"
                        handleChange={onHandleChange}
                    />
                </FormControl>

                <div className="block mt-4">
                    <label className="flex items-center">
                        <Checkbox name="remember" value={data.remember} handleChange={onHandleChange} />

                        <span className="ml-2 text-sm text-gray-600">Remember me</span>
                    </label>
                </div>

                <div className="flex items-center justify-end mt-4">
                    {canResetPassword && (
                        <Link
                            href={route('password.request')}
                            className="underline text-sm text-gray-600 hover:text-gray-900"
                        >
                            Forgot your password?
                        </Link>
                    )}

                    <Button className="ml-4" processing={processing}>
                        Log in
                    </Button>
                </div>
            </form>
        </Box>
    );
}

export default Login
