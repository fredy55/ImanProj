import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class BlogsService {

  constructor() { }

  getAuthors() {
    return [
      {
        name: 'John',
        email: 'jboy@gmail.com',
        score: 67
      },
      {
        name: 'Mary',
        email: 'maryg@gmail.com',
        score: 52
      },
      {
        name: 'Keneth',
        email: 'kboy@gmail.com',
        score: 45
      }
    ]
  }
}
