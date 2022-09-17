export default function useSwitchTheme() {
    const switchTheme = () =>
        document.documentElement.classList.toggle('dark');

    return {
        switchTheme
    }
}