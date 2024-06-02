import { Controller } from '@hotwired/stimulus'

// Usage data-controller="textarea-autogrow"
export default class extends Controller {
    resizeDebounceDelayValue

    static targets = ['textarea']

    static values = {
        resizeDebounceDelay: {
        type: Number,
        default: 100
        }
    }

    initialize () {
        this.autogrow = this.autogrow.bind(this)
    }

    connect () {
        this.textarea.style.overflow = 'hidden'
        const delay = this.resizeDebounceDelayValue

        this.onResize = delay > 0 ? debounce(this.autogrow, delay) : this.autogrow

        this.autogrow()

        this.textarea.addEventListener('input', this.autogrow)
        window.addEventListener('resize', this.onResize)
    }

    disconnect () {
        window.removeEventListener('resize', this.onResize)
    }

    reset() {
        this.textarea.style.height = 'auto';
    }

    resetIfSubmitSuccessful({ detail: { success }}) {
        if (! success) return

        this.reset()
    }

    autogrow () {
        this.textarea.style.height = 'auto' // Force re-print before calculating the scrollHeight value.
        this.textarea.style.height = `${this.textarea.scrollHeight}px`
    }

    get textarea() {
        return this.hasTextareaTarget ? this.textareaTarget : this.element
    }
}

function debounce (callback, delay) {
    let timeout

    return (...args) => {
        const context = this
        clearTimeout(timeout)

        timeout = setTimeout(() => callback.apply(context, args), delay)
    }
}
