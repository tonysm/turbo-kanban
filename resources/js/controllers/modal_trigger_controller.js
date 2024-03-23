import { Controller } from '@hotwired/stimulus'

// Usage: data-controller="modal-trigger"
export default class extends Controller {
    static outlets = ['modal']

    toggle() {
        this.modalOutlet.toggle()
    }
}
