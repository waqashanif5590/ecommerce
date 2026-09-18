const hamburger = document.querySelector('.hamburger')
const navigation = document.querySelector('.nav-bar')

hamburger?.addEventListener('click', () => {
    const isOpen = hamburger.getAttribute('aria-expanded') === 'true'

    hamburger.setAttribute('aria-expanded', String(!isOpen))
    navigation?.classList.toggle('hidden', isOpen)
})