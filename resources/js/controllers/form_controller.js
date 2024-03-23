import { Controller } from "@hotwired/stimulus"

// Connects to data-controller="form"
export default class extends Controller {
    static targets = ['cancel']

    submit() {
        this.element.requestSubmit()
    }

    cancel() {
        this.cancelTarget.click();
    }

    resetIfFrameSubmitWasSuccessful({ detail: { success }}) {
        if (! success) return

        this.element.reset()
        console.log(this.firstFocusable)
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
