const Welcome = () => import('./components/Welcome.vue' /* webpackChunkName: "resource/js/components/welcome" */)
const Search = () => import('./components/media/Search.vue' /* webpackChunkName: "resource/js/components/media/search" */)
const Location = () => import('./components/media/Location.vue' /* webpackChunkName: "resource/js/components/media/location" */)

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Welcome
    },
    {
        name: 'search',
        path: '/search',
        component: Search
    },
    {
        name: 'location',
        path: '/location',
        component: Location
    },
]
