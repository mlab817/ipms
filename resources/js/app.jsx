import './bootstrap';
import '../css/app.css';

import React from 'react';
import { createRoot } from 'react-dom/client';
import { createInertiaApp } from '@inertiajs/inertia-react';
import { InertiaProgress } from '@inertiajs/progress';
import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
import {ThemeProvider} from "@primer/react";

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Laravel';

const root = createRoot(document.getElementById('app'))

createInertiaApp({
    title: (title) => `${title} - ${appName}`,
    resolve: (name) => resolvePageComponent(`./Pages/${name}.jsx`, import.meta.glob('./Pages/**/*.jsx')),
    setup({ App, props }) {
        return root.render(
            <ThemeProvider>
                <App {...props} />
            </ThemeProvider>);
    },
});

InertiaProgress.init({ color: '#4B5563' });
