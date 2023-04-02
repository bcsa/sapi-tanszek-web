export default [
    {
        path: '/',

        component: () => import(
            /* webpackChunkName: "IndexLayout" */
            '@js/Layouts/SolarCalculatorLayout.vue'
            ),

        children: [
            {
                path: '',

                name: 'beta-index',

                component: () => import(
                    /* webpackChunkName: "Index" */
                    '@js/Views/SolarCalculator.vue'
                    ),
            },
        ]
    },
];
