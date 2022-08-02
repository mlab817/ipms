import React from 'react'
import { createRoot } from 'react-dom/client'
import { createInertiaApp } from '@inertiajs/inertia-react'
import { InertiaProgress } from '@inertiajs/progress'

const root = createRoot(document.getElementById('app'))

createInertiaApp({
    resolve: name => require(`./Pages/${name}`),
    setup({ App, props }) {
        root.render(<App {...props} />)
    },
})

InertiaProgress.init()