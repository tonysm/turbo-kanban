import { Controller } from '@hotwired/stimulus'

// Usage: data-controller="flash"
export default class extends Controller {
    remove() {
        this.element.remove()
    }
}
