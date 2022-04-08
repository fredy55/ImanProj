import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})

export class BlogsService {

  private url = 'https://vclokoreweb.com/postapp/articles';

  constructor(private httpClient: HttpClient) { }

  getPosts() {
    return this.httpClient.get(this.url);
  }

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
