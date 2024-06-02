import { Controller } from "@hotwired/stimulus"
import { renderStreamMessage } from "@hotwired/turbo"

// Connects to data-controller="form"
export default class extends Controller {
    static targets = ['cancel']

    submit() {
        if (this.element.getAttribute('aria-busy') === 'true') return;

        this.element.requestSubmit()
    }

    submitByKeyboard(event) {
        if (event.shiftKey) return;

        this.submit();
    }

    asyncSubmit(event) {
        event?.preventDefault()

        const body = new FormData(this.element)

        fetch(this.element.getAttribute('action'), {
            method: 'POST',
            body: body,
            headers: {
                'Accept': 'text/vnd.turbo-stream.html'
            }
        }).then(resp => resp.text()).then((content) => {
            renderStreamMessage(content)
        }).catch((error) => {
            console.error(error)

            this.element.dispatchEvent(new CustomEvent('turbo:submit-failed-async', {
                detail: { data: Object.fromEntries(body.entries()) }
            }))
        })
    }

    cancel() {
        this.cancelTarget.click();
    }

    resetIfFrameSubmitWasSuccessful({ detail: { success }}) {
        if (! success) return

        this.reset()
    }

    reset() {
        this.element.reset()
        this.firstFocusable?.focus()
    }

    noop() {
        // ...
    }

    get firstFocusable() {
        return this.focusables[0] || null
    }

    get focusables() {
        return [...this.element.querySelectorAll('input:not([type=hidden]), textarea')]
    }
}
